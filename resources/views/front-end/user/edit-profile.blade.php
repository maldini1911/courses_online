<div class="card card-nav-tabs text-left" id="profile-edit" style='display:none;margin:30px'>
  <h4 class="card-header card-header-info">Edit Profile</h4>
  <div class="card-body">
    <form action="{{route('profile.update', ['id' => $user->id])}}" method="POST">
        {{csrf_field()}}
        <div class='row'>
            <div class='col-lg-4'>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="name" value='{{$user->name}}'>
                </div>
            </div>

            <div class='col-lg-4'>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value='{{$user->email}}'>
                </div>
            </div>

            <div class='col-lg-4'>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name='password' placeholder="Password">
                </div>
            </div>

            <div class='col-lg-12'>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </form>
  </div>
</div>
