{{csrf_field()}}
<div class="row">
    <div class="col-md-12">
        <label class="bmd-label-floating">Name</label>
        <div class="form-group bmd-form-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{isset($row) ? $row->name:''}}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <label class="bmd-label-floating">Meta Keywords</label>
        <div class="form-group bmd-form-group">
            <input type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" value="{{isset($row) ? $row->meta_keywords:''}}">
            @error('meta_keywords')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <label class="bmd-label-floating">Youtube URL</label>
        <div class="form-group bmd-form-group">

            <input type="text" name="youtube" class="form-control @error('youtube') is-invalid @enderror" value="{{isset($row) ? $row->youtube:''}}">
            @error('youtube')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <label class="bmd-label-floating">Meta Description</label>
        <div class="form-group bmd-form-group">
            <textarea class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc">
                {{isset($row) ? $row->meta_desc:''}}
            </textarea>
            @error('meta_desc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <label class="bmd-label-floating">Description</label>
        <div class="form-group bmd-form-group">
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
        <label class="bmd-label-floating">Category Name</label>
        <div class="form-group bmd-form-group">
            <select name="cat_id" class="form-control @error('cat_id') is-invalid @enderror">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ isset($row) && $row->cat_id == $category->cat_id ? 'selected' : ''}}>
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
            @error('cat_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <label class="bmd-label-floating">Skills</label>
        <div class="form-group bmd-form-group">
            <select name="skills[]" class="form-control @error('skills[]') is-invalid @enderror" multiple style='height:100px'>
                @foreach($skills as $skill)
                    <option value="{{$skill->id}}" {{ in_array($skill->id, $selectSkills) ? 'selected':''}}>
                        {{$skill->name}}
                    </option>
                @endforeach
            </select>
            @error('skills[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <label class="bmd-label-floating">Tags</label>
        <div class="form-group bmd-form-group">
            <select name="tags[]" class="form-control @error('skills[]') is-invalid @enderror" multiple style='height:100px'>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" {{ in_array($tag->id, $selectTags) ? 'selected':''}}>
                        {{$tag->name}}
                    </option>
                @endforeach
            </select>
            @error('tags[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <label class="bmd-label-floating">Video Stauts</label>
        <div class="form-group bmd-form-group">
            <select name="published" class="form-control @error('published') is-invalid @enderror">
                @isset($row)
                <option value="{{$row->published}}"> {{ $row->published == 1 ? 'published' : 'hidden'}}</option>
                @endisset
                <option value="1" {{ isset($row) && $row->published == 1 ? 'selected' : ''}}> Published</option>
                <option value="0" {{ isset($row) && $row->published == 0 ? 'selected' : ''}}> Hidden</option>
            </select>
            @error('published')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <label>Video Image</label>
        <div>
            <input type="file" name="image">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

</div>
<!-- End Row -->
