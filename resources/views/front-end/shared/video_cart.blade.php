<div class="card" style="width: 20rem;">
<a href="{{route('index.video', ['id' => $video->id])}}" title="{{$video->name}}">
  <img class="card-img-top" src="{{url('/')}}/uploads/{{$video->image}}" alt="{{$video->name}}" height="400px">
</a>
  <div class="card-body">
    <p class="card-text">
    <a href="{{route('index.video', ['id' => $video->id])}}" title="{{$video->name}}"> {{$video->name}} </a>
    </p>
    <small>{{$video->created_at}}</small>
  </div>
</div>