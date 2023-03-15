<div class="col-md-6 mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" value="{{old('title') ?? $slider->title}}"
           class="form-control rounded border border-secondary">
    <small class="text-danger">{{ $errors->first('title') }}</small>
</div>
<div class="col-md-12 mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control rounded border border-secondary"
              rows="3">{{old('description') ?? $slider->description}}</textarea>
    <small class="text-danger">{{ $errors->first('description') }}</small>
</div>
<div class="col-md-6 mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" name="image"  class="form-control rounded border border-secondary">
    @if(!$slider->image==null)
        <img src="{{ asset('storage/'.$slider->image) }}" class="img-thumbnail" alt="Responsive image" width="25%" height="25%">
    @endif
    <small class="text-danger">{{ $errors->first('image') }}</small>
</div>

<div class="col-md-6 mb-3">
    <label for="status" class="form-label">Status</label><br>
    <select name="status" class="form-control rounded border border-secondary">
        <option value="" disabled>Select Color Status</option>
        @if(!$slider->id==null)
            <option value="{{$slider->status}}" selected>
                @if($slider->status==0)
                    Visible
                @else
                    Hidden
                @endif
            </option>
        @endif
        <option value="0" {{ $slider->status=='Visible'?'selected':'' }}>Visible</option>
        <option value="1" {{ $slider->status=='Hidden'?'selected':'' }}>Hidden</option>
    </select>
    <small class="text-danger">{{ $errors->first('status') }}</small>
</div>




