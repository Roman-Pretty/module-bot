from django.http import JsonResponse
from django.db.models import Count
from django.db.models.functions import TruncDate
from django.utils.timezone import now, timedelta
from api.models import ChatLog, Module, ModuleMember
from collections import defaultdict
import csv
from django.http import HttpResponse

# This file is mostly for usage data used in the Dashboard
# overview page and the user profile page

def get_chats_based_on_timeframe(timeframe, module_id):
    """
    Get the chat logs for a module based on the passed timeframe
    (used for graph plotting in the frontend)
    """
    today = now().date()

    if timeframe == '1 day':
        start_date = today - timedelta(days=0)
        end_date = today
        range_dates = [start_date]

    elif timeframe == '3 days':
        start_date = today - timedelta(days=2)
        end_date = today
        range_dates = [start_date + timedelta(days=i) for i in range(3)]

    elif timeframe == '1 week':
        start_date = today - timedelta(days=6)
        end_date = today
        range_dates = [start_date + timedelta(days=i) for i in range(7)]

    elif timeframe == '1 month':
        start_date = today.replace(day=1) - timedelta(days=1)
        start_date = start_date.replace(day=1)
        end_date = today
        days_in_range = (end_date - start_date).days + 1
        range_dates = [start_date + timedelta(days=i) for i in range(days_in_range)]

    else:
        return defaultdict(int), [], []

    logs = (
        ChatLog.objects.filter(
            module__id=module_id,
            timestamp__date__range=[start_date, end_date],
            bot_message=False,
        )
        .annotate(day=TruncDate('timestamp'))
        .values('day')
        .annotate(count=Count('id'))
    )

    logs_dict = defaultdict(int, {log['day']: log['count'] for log in logs})

    return logs_dict, range_dates, logs


def chart_data(request, module_id):
    """
    Calls the above function to get the chat logs for a module based on the passed timeframe
    and returns the data in a format that can be used for graph plotting
    """
    timeframe = request.GET.get('timeframe', '1 week').lower()
    if timeframe not in ['1 day', '3 days', '1 week', '1 month']:
        return JsonResponse({'error': 'Invalid timeframe'}, status=400)

    user = request.user
    if not ModuleMember.objects.filter(module__id=module_id, user=user, role='Organizer').exists():
        return JsonResponse({'error': 'User does not have access to this module'}, status=403)

    logs_dict, range_dates, _ = get_chats_based_on_timeframe(timeframe, module_id)

    labels = [date.strftime('%Y-%m-%d') for date in range_dates]
    values = [logs_dict.get(date, 0) for date in range_dates]

    return JsonResponse({'labels': labels, 'values': values})


def chat_summary(request, module_id):
    """
    Same as above, but to create a text summary to appear
    next to the graph on the frontend
    """
    timeframe = request.GET.get('timeframe', '1 week').lower()
    if timeframe not in ['1 day', '3 days', '1 week', '1 month']:
        return JsonResponse({'error': 'Invalid timeframe'}, status=400)

    user = request.user
    if not ModuleMember.objects.filter(module__id=module_id, user=user, role='Organizer').exists():
        return JsonResponse({'error': 'User does not have access to this module'}, status=403)

    logs_dict, _, logs = get_chats_based_on_timeframe(timeframe, module_id)

    user_ids = (
        ChatLog.objects.filter(
            module__id=module_id,
            timestamp__date__range=[min(logs_dict.keys(), default=None), max(logs_dict.keys(), default=None)],
            bot_message=False,
        )
        .values_list('user_id', flat=True)
        .distinct()
    )

    total_chats = sum(logs_dict.values())
    total_users = len(user_ids)
    avg_questions_per_user = total_chats / total_users if total_users > 0 else 0

    return JsonResponse(
        {'total_chats': total_chats, 'total_users': total_users,
         'avg_questions_per_user': round(avg_questions_per_user, 2)})


def download_chat_logs(request, module_id):
    """
    Download the chat logs for a module as a CSV file.
    Used for external graph plotting in the report.
    """
    user = request.user
    if not ModuleMember.objects.filter(module__id=module_id, user=user, role='Organizer').exists():
        return JsonResponse({'error': 'User does not have access to this module'}, status=403)

    logs = ChatLog.objects.filter(module__id=module_id, bot_message=False).order_by('timestamp')
    logs = logs.values('timestamp', 'user_id', 'message')

    response = HttpResponse(content_type='text/csv')
    response['Content-Disposition'] = f'attachment; filename=chat_logs_{module_id}.csv'

    writer = csv.writer(response)
    writer.writerow(['Timestamp', 'User ID', 'Message'])

    # Write each log entry as a new row in the CSV
    for log in logs:
        writer.writerow([log['timestamp'], log['user_id'], log['message']])

    return response


def user_summary(request):
    """
    Simply returns a summary of the user for the profile page,
    including a gamified representation of their interactions with
    the app compared to other users.
    """
    user = request.user

    # Count the number of modules the user is enrolled in
    modules = Module.objects.filter(members=user).count()

    # Count the number of user-initiated chats
    user_chats = ChatLog.objects.filter(user=user, bot_message=False).count()

    # Get all distinct users who have initiated chats
    all_users = ChatLog.objects.filter(bot_message=False).values_list('user', flat=True).distinct()

    # Create a dictionary with user IDs and their respective chat counts
    user_chat_counts = {
        user_id: ChatLog.objects.filter(user_id=user_id, bot_message=False).count()
        for user_id in all_users
    }

    # Sort users by chat count in descending order
    sorted_users = sorted(user_chat_counts.items(), key=lambda x: x[1], reverse=True)

    # Find the rank of the current user
    rank = next((i + 1 for i, (user_id, _) in enumerate(sorted_users) if user_id == user.id), None)

    # Total number of users
    total_users = len(sorted_users)

    # Calculate the user's top percentage
    if rank is None or total_users == 0:
        # User has no activity or no users exist
        top_percentage = 0
    else:
        # Calculate rank-based percentage
        top_percentage = (rank / total_users) * 100

    # Round the percentage to 2 decimal places
    top_percentage = round(top_percentage, 2)

    return JsonResponse({
        'modules': modules,
        'user_chats': user_chats,
        'top_percentage': top_percentage
    })
