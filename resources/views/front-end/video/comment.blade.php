 <!-- Start Row Comments -->
<div class="row" id="comments">
    <div class='col-lg-12'>
    @include('front-end.video.add-comment')
    <div class="card card-nav-tabs text-left">
    @php $comments = $video->comments @endphp
        <div class="card-header card-header-primary">
            <h2>Comments - {{count($comments)}}</h2>
        </div>
        @foreach($comments->sortByDesc('id') as $comment)
        <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
               <a href="{{route('frontend.profile', ['id' => $comment->user->id])}}"> {{$comment->user->name}}</a>
            </div>
            <div class="col-lg-6 text-right">
            {{$comment->created_at}} 
            </div>
        </div>
        <br>
            <p class="card-text"> {{$comment->comment}}</p>
        
            <!-- Start -->
            @if(auth()->user())
                @if(auth()->user()->group == 'admin' || auth()->user()->id == $comment->user->id)
                <a type="button" class="alert alert-success" data-toggle="modal" data-target="#edit-{{$comment->id}}">
                    Edit
                </a>

                <div class="modal fade" id="edit-{{$comment->id}}" tabindex="-1" role="dialog" aria-hidden="false">
                    <div class="modal-dialog modal-register">
                        <div class="modal-content">
                            <div class="modal-header no-border-header text-center">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="text-muted">Edit Comment</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('edit/comment/'.$comment->id)}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                    <label>Edit Comment</label>
                                    <textarea type="text" placeholder="Comment" class="form-control" name="comment"> </textarea>
                                    <input type='hidden' name="video_id" value="{{$video->id}}">
                                    </div>
                                    <button type="submit" class="btn btn-block btn-round"> Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @endif
            @endif
            <!-- End -->
        </div>
        @if(!$loop->last)
            <hr>
        @endif
        @endforeach
    </div>
    </div>
</div>
<!-- End Row comments -->