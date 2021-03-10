@extends('back-end.layout.app')

@section('title_browser')
  {{$nav_title}}
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

  <form action="{{route($routeName.'.update', ['id' => $row])}}" method="POST" enctype="multipart/form-data">
      {{method_field('put')}}
      @include('back-end.'.$folderName.'.form')
      <button type="submit" class="btn btn-primary pull-right">Edit {{$medual}}</button>
      <div class="clearfix"></div>
  </form>

  @slot('md4')
    @if($row->youtube)
      <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$row->youtube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    @endif
    <hr>
    <img src="{{url('uploads/'.$row->image)}}" width="100%">
  @endslot

@endcomponent


@component('back-end.shared.edit', ['title_page' => "Comments", 'desc_page' => 'Here Found All Comments'])
  @slot('addButton')
  <div class="col-lg-4 text-right">
    <a href="{{route($routeName.'.index')}}" class="btn btn-white btn-round">
        All Comments
    </a>
  </div>
  @endslot

  @include('back-end.comments.index')

  @slot('md4')
    @include('back-end.comments.create')
  @endslot

@endcomponent
@endsection