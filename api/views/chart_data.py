from django.http import JsonResponse
from django.db.models import Count
from django.db.models.functions import TruncDate
from django.utils.timezone import now, timedelta
from calendar import monthrange
from api.models import ChatLog
from collections import defaultdict


def chart_data(request, module_id):
    # Get the timeframe parameter (default to "week")
    timeframe = request.GET.get('timeframe', 'week').lower()
    today = now().date()

    if timeframe == 'week':
        # Current week: Monday to Sunday
        start_date = today - timedelta(days=today.weekday())
        end_date = start_date + timedelta(days=6)
        range_dates = [start_date + timedelta(days=i) for i in range(7)]

    elif timeframe == 'month':
        # Current month: 1st to the last day of the month
        start_date = today.replace(day=1)
        end_date = today.replace(day=monthrange(today.year, today.month)[1])
        range_dates = [start_date + timedelta(days=i) for i in range((end_date - start_date).days + 1)]

    elif timeframe == '3months':
        # Past three months: from the first day of the month three months ago to today
        three_months_ago = (today.replace(day=1) - timedelta(days=1)).replace(day=1) - timedelta(days=1)
        start_date = three_months_ago.replace(day=1)
        end_date = today
        range_dates = [start_date + timedelta(days=i) for i in range((end_date - start_date).days + 1)]

    else:
        return JsonResponse({'error': 'Invalid timeframe parameter'}, status=400)

    # Query ChatLogs for the given module ID within the calculated range
    weekly_logs = (
        ChatLog.objects.filter(module__id=module_id, timestamp__date__range=[start_date, end_date], bot_message=False)
        .annotate(day=TruncDate('timestamp'))
        .values('day')
        .annotate(count=Count('id'))
    )

    # Create a dictionary of results with default value of 0 for days with no entries
    logs_dict = defaultdict(int, {log['day']: log['count'] for log in weekly_logs})

    # Prepare labels and values, ensuring all days in the range are included
    labels = [date.strftime('%Y-%m-%d') for date in range_dates]
    values = [logs_dict.get(date, 0) for date in range_dates]

    return JsonResponse({'labels': labels, 'values': values})
