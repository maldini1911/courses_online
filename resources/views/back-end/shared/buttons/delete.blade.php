<form action="{{route($routeName.'.destroy', ['id' => $row])}}" method="POST">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{$title_page}}">
        <i class="material-icons">close</i>
    </button>
</form>