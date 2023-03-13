<div class="col-md-6 mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" value="{{old('name') ?? $color->name}}"
           class="form-control rounded border border-secondary">
    <small class="text-danger">{{ $errors->first('name') }}</small>

</div>
<div class="col-md-6 mb-3">
    <label for="code" class="form-label">Code</label>
    <input type="text" name="code" value="{{old('code') ?? $color->code}}"
           class="form-control rounded border border-secondary">
    <small class="text-danger">{{ $errors->first('code') }}</small>
</div>
<div class="col-md-6 mb-3">
    <label for="status" class="form-label">Status</label><br>
    <select name="status" class="form-control rounded border border-secondary">
        <option value="" disabled>Select Color Status</option>
        @if(!$color->id==null)
            <option value="{{$color->status}}" selected>
                @if($color->status==0)
                    Visible
                @else
                    Hidden
                @endif
            </option>
        @endif

        <option value="0" {{ $color->status=='Visible'?'selected':'' }}>Visible</option>
        <option value="1" {{ $color->status=='Hidden'?'selected':'' }}>Hidden</option>
    </select>
    <small class="text-danger">{{ $errors->first('status') }}</small>
</div>




