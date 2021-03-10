{{csrf_field()}}
<div class="row">
    <div class="col-md-12">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Username</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{isset($row) ? $row->name:''}}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{isset($row) ? $row->email:''}}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <label class="bmd-label-floating">Users Group</label>
        <div class="form-group bmd-form-group">
            <select name="group" class="form-control @error('group') is-invalid @enderror">
                <option value="admin" {{ isset($row) && $row->group == 'admin' ? 'selected' : ''}}> Admin</option>
                <option value="user" {{ isset($row) && $row->group == 'user' ? 'selected' : ''}}> User</option>
            </select>
            @error('group')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

</div>