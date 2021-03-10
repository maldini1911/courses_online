@extends('back-end.layout.app')

@section('title_browser')
  Users
@endsection

@section('content')

@component('back-end.shared.edit', ['title_page' => $title_page, 'desc_page' => $desc_page])
  @slot('addButton')
  <div class="col-lg-4 text-right">
    <a href="{{route($routeName.'.index')}}" class="btn btn-white btn-round">
        All {{$medual}}s
    </a>
  </div>
  @endslot

  <form action="{{route($routeName.'.update', ['id' => $row])}}" method="POST">
      {{method_field('put')}}
      @include('back-end.'.$folderName.'.form')
      <button type="submit" class="btn btn-primary pull-right">Edit {{$medual}}</button>
      <div class="clearfix"></div>
  </form>
@endcomponent
@endsection