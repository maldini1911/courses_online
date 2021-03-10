@extends('front-end.layouts.app')
@section('content')
<div class="main main-raised text-center" style='margin-top:150px'>
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="{{url('/')}}/frontend/img/ryan.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid" width="40%">
              </div>
              <div class="name">
                <h3 class="title">{{$user->name}}</h3>
                <h6>Fullstack Web Developer</h6>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
              </div>
            </div>
          </div>
        </div>

        @if(auth()->user() && auth()->user()->id == $user->id)
        <hr>
        <button type="button" class="btn btn-success" onclick="$('#profile-edit').slideToggle()">Edit Profile</button>
        @include("front-end.user.edit-profile")
        @endif
      </div>
    </div>
  </div>
@endsection
