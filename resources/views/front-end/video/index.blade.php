@extends('front-end.layouts.app')
@section('content')
<div class="section section-navigation">
    <div class="container tim-container">
        <div class="title">
          <h1 class="alert-primary" style="padding:15px">{{$video->name}}</h1>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{$video ->youtube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <!-- Start Row -->
        <div class="row">
          <div class="col-lg-4">
              <p>{{$video->user->name}}</p>
              <p>{{$video->created_at}}</p>
              <p>{{$video->desc}}</p>
            </div>

            <div class="col-lg-2">
             <p><a href="{{route('index.category', ['id' => $video->category->id])}}">{{$video->category->name}}</a></p>
            </div>

            <div class="col-lg-3">
              <p>
                @foreach($video->tags as $tag)
                <p><a href="{{route('index.tag', ['id' => $tag->id])}}"><span class="alert alert-success">{{$tag->name}}</span></a></p>
                @endforeach
              </p>
            </div>

            <div class="col-lg-3">
              <p>
                @foreach($video->skills as $skill)
                <p><a href="{{route('index.skill', ['id' => $skill->id])}}"><span class="alert alert-primary">{{$skill->name}}</span></a></p>
                @endforeach
              </p>
            </div>
        </div>
        <!-- End Row -->
        <br> <br>
        @include('front-end.video.comment')
    </div>
</div>
@endsection
