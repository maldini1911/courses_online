{{csrf_field()}}
<div class="row">
    <div class="col-md-6">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Page Name</label>
        <br>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{isset($row) ? $row->name:''}}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Meta Keywords</label>
        <br>
        <input type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" value="{{isset($row) ? $row->meta_keywords:''}}">
        @error('meta_keywords')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>

    <div class="col-md-12">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Description</label>
        <br>
        <textarea class="form-control @error('desc') is-invalid @enderror" name="desc"> 
            {{isset($row) ? $row->desc:''}}
        </textarea>
        @error('desc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>

    <div class="col-md-12">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Meta Description</label>
        <br>
        <textarea type="password" class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc"> 
            {{isset($row) ? $row->meta_desc:''}}
        </textarea>
        @error('meta_desc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>
</div>