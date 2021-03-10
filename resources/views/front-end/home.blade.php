@extends('front-end.layouts.app')

@section('content')
<div class="section section-navigation">
    <div class="container tim-container">
        <div class="title">
          <h3 class="alert-primary" style="padding:15px">List - Videos</h3>
          @if(request()->has('search') && request()->get('search') != '')
            <h4>Your Search In <span style='color:red'><b>{{request()->get('search')}}</b></span> | <a href="{{route('home')}}">Reset</a></h4>
          @endif
        </div>
        @include('front-end.shared.video_row')
    </div>
</div>
@endsection
