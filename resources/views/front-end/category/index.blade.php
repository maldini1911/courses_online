@extends('front-end.layouts.app')

@section('content')
<div class="section section-navigation">
    <div class="container tim-container">
        <div class="title">
          <h3 class="alert-primary" style="padding:15px">{{$cat->name}}</h3>
        </div>
        @include('front-end.shared.video_row')
    </div>
</div>
@endsection
