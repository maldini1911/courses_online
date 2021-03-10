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

  <form action="{{route($routeName.'.update', ['id' => $row])}}" method="POST">
      {{method_field('put')}}
      @include('back-end.'.$folderName.'.form')
      <button type="submit" class="btn btn-primary pull-right">Edit {{$medual}}</button>
      <div class="clearfix"></div>
  </form>

  <!-- Start Reply Message -->
  <hr>
    <h4> Reply On This Message</h4>
    <form action="{{route($routeName.'.reply', ['id' => $row])}}" method="POST">
      {{csrf_field()}}
      <div class="row">
          <div class="col-md-12">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Message</label>
                <br>
                @php $input = "message";  @endphp
                <input type="text" class="form-control @error($input) is-invalid @enderror" name="{{$input}}">
                @error($input)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
      </div>
      <button type="submit" class="btn btn-success pull-right">Send Reply</button>
      <div class="clearfix"></div>
  </form>
  <!-- End Reply Message -->
@endcomponent
@endsection