<!-- Start Add Comment -->
<div class="card">
    <div class="card-body">
        <form action="{{url('add/comment/'.$video->id)}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label>Add Comment</label>
                <textarea type="text" placeholder="Comment" class="form-control" name="comment"> </textarea>
                <input type='hidden' name="video_id" value="{{$video->id}}">
            </div>
            <button type="submit" class="btn btn-round"> Add</button>
        </form>
    </div>
</div>
<!-- End Add Comment -->