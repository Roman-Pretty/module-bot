from django.http import JsonResponse
from django.db.models import Count
from django.db.models.functions import TruncDate
from django.utils.timezone import now, timedelta
from api.models import ChatLog, Module, ModuleMember
from collections import defaultdict
import csv
from django.http import HttpResponse


def get_chats_based_on_timeframe(timeframe, module_id):
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
        {'total_chats': total_chats, 'total_users': total_users, 'avg_questions_per_user': round(avg_questions_per_user, 2)})


def download_chat_logs(request, module_id):
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
    user = request.user

    modules = Module.objects.filter(members=user).count()
    user_chats = ChatLog.objects.filter(user=user, bot_message=False).count()
    all_users = ChatLog.objects.filter(bot_message=False).values_list('user', flat=True).distinct()

    user_chat_counts = {
        user_id: ChatLog.objects.filter(user_id=user_id, bot_message=False).count()
        for user_id in all_users
    }

    sorted_users = sorted(user_chat_counts.items(), key=lambda x: x[1], reverse=True)
    rank = next((i + 1 for i, (user_id, _) in enumerate(sorted_users) if user_id == user.id), len(sorted_users))

    total_users = len(sorted_users)
    top_percentage = 100 - (1 - (rank - 1) / total_users) * 100 if total_users > 0 else -1

    if top_percentage == 0:
        top_percentage = 1

    if top_percentage == -1:
        top_percentage = 0

    top_percentage = round(top_percentage, 2)

    return JsonResponse({
        'modules': modules,
        'user_chats': user_chats,
        'top_percentage': top_percentage
    })


