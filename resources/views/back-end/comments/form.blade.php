@php $input = 'comment' @endphp
<div class="col-md-12">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">New Comment</label>
        <textarea class="form-control @error($input) is-invalid @enderror" name="{{$input}}"> 

        </textarea>
        @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>