<div class="title">
    <h3 class="alert-primary" style="padding:15px">List - Videos</h3>
</div>
<div class="row">
    @foreach($videos as $video)
        <div class="col-lg-4">
            @include('front-end.shared.video_cart')
        </div>
    @endforeach
</div>

<div class="row">
    <div class="col-lg-12 text-center">
        {{$videos->links()}}
    </div>
</div>
