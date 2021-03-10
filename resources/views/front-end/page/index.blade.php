@extends('front-end.layouts.app')
@section('content')
<div class="section section-navigation text-center">
    <div class="container tim-container">
        <div class="title">
          <h3 class="alert-primary" style="padding:15px">{{$page->name}}</h3>
        </div>
        <p style="margin:150px">{{$page->desc}}</p>
    </div>
</div>
@endsection
