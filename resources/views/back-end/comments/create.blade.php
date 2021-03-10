<form action="{{route('comment.store')}}" method="POST">
{!! csrf_field() !!}
    @include('back-end.comments.form')
    <input type="hidden" name="video_id" value="{{$row->id}}">
    <input type="submit" value="Add Comment">
</form>