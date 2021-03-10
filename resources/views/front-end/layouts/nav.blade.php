  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{url('/')}}" rel="tooltip" title="Coded by Sky Website" data-placement="bottom" target="_blank">
            Sky Website
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
            </button>
            <div class="dropdown-menu">
                @foreach($categories as $category)
                <a class="dropdown-item" href="{{url('category/'.$category->id)}}">{{$category->name}}</a>
                @endforeach
            </div>
            </div>
          </li>

          <li class="nav-item">
            <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Skills
            </button>
            <div class="dropdown-menu">
            @foreach($skills as $skill)
                <a class="dropdown-item" href="{{route('index.skill', ['id' => $skill->id])}}">{{$skill->name}}</a>
            @endforeach
            </div>
            </div>
          </li>

          @if(auth()->check())
          <li class="nav-item">
            <form class="form-inline ml-auto" style="margin-top:15px" action="{{route('home')}}">
              <div class="form-group has-white">
                <input type="text" name="search" class="form-control" placeholder="Search">
              </div>
            </form>
          </li>

          <li class="nav-item">
            <a href="{{ route('frontend.profile', ['id' => auth()->user()->id]) }}" target="_blank" class="nav-link"> Profile</a>
          </li>

          <li class="nav-item">
            <a href="{{ route('logout') }}" target="_blank" class="nav-link"> Logout</a>
          </li>
          @else
          <li class="nav-item">
            <a href="{{url('login')}}" target="_blank" class="nav-link"> Login</a>
          </li>

          <li class="nav-item">
            <a href="{{url('register')}}" target="_blank" class="nav-link"> Register</a>
          </li>

          <li class="nav-item">
            <form class="form-inline ml-auto" style="margin-top:15px" action="{{route('home')}}">
              <div class="form-group has-white">
                <input type="text" name="search" class="form-control" placeholder="Search">
              </div>
            </form>
          </li>
          @endif

        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
