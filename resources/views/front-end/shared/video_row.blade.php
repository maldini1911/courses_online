<div class="row">
    @foreach($videos as $video)
        <div class="col-lg-4">
            @include('front-end.shared.video_cart')
        </div>
    @endforeach
</div>

<div class="row">
    <div class="col-lg-12">
        {{$videos->links()}}
    </div>
</div>