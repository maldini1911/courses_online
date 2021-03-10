@extends('back-end.layout.app')

@section('title_browser')
  {{$nav_title}}
@endsection

@section('content')

@component('back-end.shared.create', ['title_page' => $title_page, 'desc_page' => $desc_page])
  @slot('addButton')
    <div class="col-lg-4 text-right">
      <a href="{{route($routeName.'.index')}}" class="btn btn-white btn-round">
          All {{$medual}}s
      </a>
    </div>
  @endslot
  <form action="{{route($routeName.'.store')}}" method="POST">
      @include('back-end.'.$folderName.'.form')
      <button type="submit" class="btn btn-primary pull-right">Create {{$medual}}</button>
      <div class="clearfix"></div>
  </form>
@endcomponent
@endsection