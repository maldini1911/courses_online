@extends('back-end.layout.app')

@section('title_browser')
  Users
@endsection

@section('content')

@component('back-end.shared.table', ['title_page' => $title_page, 'desc_page' => $desc_page])
@slot('addButton')

<div class="col-lg-4 text-right">
  <a href="{{route($routeName.'.create')}}" class="btn btn-white btn-round">
      Create {{$title_page}}
  </a>
</div>
@endslot


        {{$rows->links()}}
@endcomponent








@endsection