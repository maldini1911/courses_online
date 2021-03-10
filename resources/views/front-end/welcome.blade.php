@extends('front-end.layouts.app')

@section('content')

<div class="page-header section-dark" style="background-image: url('./frontend/img/antoine-barres.jpg')">
    <div class="filter"></div>
      <div class="content-center">
        <div class="container">
          <div class="title-brand">
            <h1 class="presentation-title">Sky Website</h1>
            <div class="fog-low">
              <img src="{{url('/')}}/frontend/img/fog-low.png" alt="">
            </div>
            <div class="fog-low right">
              <img src="{{url('/')}}/frontend/img/fog-low.png" alt="">
            </div>
          </div>
          <h2 class="presentation-subtitle text-center">Learn Programming </h2>
        </div>
      </div>
      <div class="moving-clouds" style="background-image: url('./frontend/img/clouds.png'); "></div>
    </div>
  <div class="main">
    <div class="container tim-container">

      @include('front-end.home-sections.videos')
      <hr>
      @include('front-end.home-sections.statics')
      <hr>
      @include('front-end.home-sections.contact')

    </div>
  </div>
@endsection







