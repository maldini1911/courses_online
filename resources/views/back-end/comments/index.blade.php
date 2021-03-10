@push('js')
    <script>
        $(function(){

                $('.edit-comment').click(function(){
                        $(this).hide();
                }); 
        });
    </script>
@endpush
<div class="col-md-12">
    <label class="bmd-label-floating">All Comments</label>
    <div class="table-responsive">
          <table class="table table-bordered text-center" id="comments">
              <thead style="background:#8832A0;color:#fff">
                <td>Add By</td>
                <td>Comment</td>
                <td>Time </td>
                <td> Action</td>
              </thead>
              <tbody>
              @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->user->name}}</td>
                    <td>{{ $comment->comment }}</td>
                    <td><small>{{ $comment->created_at }}</small></td>
                    <td style="display:flex">
                    <button class="btn btn-white btn-link btn-sm edit-comment" data-original-title="Edit {{$title_page}}">
                        <i class="material-icons">edit</i>
                    </button>
                    <a href="{{route('comment.delete', ['id' => $comment->id])}}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{$title_page}}">
                        <i class="material-icons">close</i>
                    </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="5"> 
                        <form action="{{route('comment.update', ['id' => $comment->id])}}" method="POST">
                        {!! csrf_field() !!}
                            <textarea class="form-control @error($comment->comment) is-invalid @enderror" name="comment"> 
                                {{ $comment->comment }}
                            </textarea>
                            <input type="hidden" name="video_id" value="{{$row->id}}">
                            <input type="submit" value="Edit Comment">
                        </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
</div>
</div>