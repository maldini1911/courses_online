@extends('back-end.layout.app')

@section('title_browser')
  {{$nav_title}}
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

<div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>
                ID
              </th>
              <th>
                Name
              </th>
              <th>
                 Meta KeyWords
              </th>
              <th>
                 Meta Description
              </th>
              <th class="text-right">
                Control
              </th>
            </thead>
            <tbody>
              @foreach($rows as $row)
                <tr>
                  <td>
                    {{$row->id}}
                  </td>
                  <td>
                    {{$row->name}}
                  </td>
                  <td>
                    {{$row->meta_keywords}}
                  </td>
                  <td>
                    {{$row->meta_desc}}
                  </td>
                  <td class="td-actions text-right">
                     @include('back-end.shared.buttons.edit')
                     @include('back-end.shared.buttons.delete')
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{$rows->links()}}
@endcomponent








@endsection