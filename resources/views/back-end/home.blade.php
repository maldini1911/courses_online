@extends('back-end.layout.app')

@section('title_browser')
  Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
            <i class="fa fa-youtube"></i>
            </div>
            <p class="card-category">Videos</p>
            <h3 class="card-title"> {{\App\Models\Video::count()}}</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <a href="{{url('admin/videos')}}" class="warning-link">All videos</a>
            </div>
        </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
            <i class="material-icons">store</i>
            </div>
            <p class="card-category">Skills</p>
            <h3 class="card-title">{{\App\Models\Video::count()}}</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <a href="{{url('admin/skills')}}" class="warning-link">All Skills</a>
            </div>
        </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
            <i class="fa fa-tags"></i>
            </div>
            <p class="card-category">Tags</p>
            <h3 class="card-title">{{\App\Models\Tag::count()}}</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <a href="{{url('admin/tags')}}" class="warning-link">All Tags</a>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
            <i class="fa fa-comments"></i>
            </div>
            <p class="card-category">Comments</p>
            <h3 class="card-title">{{\App\Models\Comment::count()}}</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <a href="{{url('admin/videos')}}" class="warning-link">Cheack Videos</a>
            </div>
        </div>
        </div>
    </div>
</div>

@include('back-end.home-sections.states-comments')

@endsection
