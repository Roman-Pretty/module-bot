from rest_framework.decorators import api_view
from rest_framework.response import Response
from rest_framework import status
from api.models import Module


@api_view(['POST'])
def set_current_module(request):
    """
    Sets the current module and initializes embeddings for it.
    """
    # Extract data from the request
    course_id = request.data.get('course_id')

    if not course_id:
        return Response(
            {'status': 'error', 'message': 'Course ID is required'},
            status=status.HTTP_400_BAD_REQUEST
        )

    try:
        # Retrieve the module
        module = Module.objects.get(course_id=course_id)

        # Return a success response
        return Response(
            {'status': 'success', 'message': f'Module switched to {module.name}'},
            status=status.HTTP_200_OK
        )

    except Module.DoesNotExist:
        return Response(
            {'status': 'error', 'message': 'Module not found'},
            status=status.HTTP_404_NOT_FOUND
        )

    except Exception as e:
        return Response(
            {'status': 'error', 'message': f'An unexpected error occurred: {str(e)}'},
            status=status.HTTP_500_INTERNAL_SERVER_ERROR
        )
