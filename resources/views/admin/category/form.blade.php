<div class="col-md-6 mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" value="{{old('name') ?? $category->name}}"
           class="form-control rounded border border-secondary">
    <small class="text-danger">{{ $errors->first('name') }}</small>

</div>
<div class="col-md-6 mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input type="text" name="slug" value="{{old('slug') ?? $category->slug}}"
           class="form-control rounded border border-secondary">
    <small class="text-danger">{{ $errors->first('slug') }}</small>
</div>
<div class="col-md-12 mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control rounded border border-secondary"
              rows="3">{{old('description') ?? $category->description}}</textarea>
    <small class="text-danger">{{ $errors->first('description') }}</small>
</div>
<div class="col-md-6 mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" name="image" class="form-control rounded border border-secondary">
    @if(!$category->image==null)
        <img src="{{ asset('storage/'.$category->image) }}" class="img-thumbnail" alt="Responsive image" width="60px" height="60px">
    @endif
   <small class="text-danger">{{ $errors->first('image') }}</small>
</div>
<div class="col-md-6 mb-3">
    <label for="status" class="form-label">Status</label><br>
    <select name="status" class="form-control rounded border border-secondary">
        <option value="" disabled>Select Category Status</option>
        @if(!$category->id==null)
            <option value="{{$category->status}}" selected >
                @if($category->status==0)
                    Visible
                @else
                    Hidden
                @endif
            </option>
        @endif

        <option value="0" {{ $category->status=='Visible'?'selected':'' }}>Visible</option>
        <option value="1" {{ $category->status=='Hidden'?'selected':'' }}>Hidden</option>
    </select>
    <small class="text-danger">{{ $errors->first('status') }}</small>
</div>
<div class="col-md-12 mb-3">
    <h4>SEO Tags</h4>
</div>
<div class="col-md-6 mb-3">
    <label for="" class="form-label">Meta Title</label>
    <input type="text" name="meta_title" value="{{old('meta_title') ?? $category->meta_title}}" class="form-control rounded border border-secondary">
    <small class="text-danger">{{ $errors->first('meta_title') }}</small>
</div>
<div class="col-md-12 mb-3">
    <label for="" class="form-label">Meta Keyword</label>
    <textarea name="meta_keyword" class="form-control rounded border border-secondary" rows="3">{{old('meta_keyword') ?? $category->meta_keyword}}</textarea>
    <small class="text-danger">{{ $errors->first('meta_keyword') }}</small>
</div>
<div class="col-md-12 mb-3">
    <label for="" class="form-label">Meta Description</label>
    <textarea name="meta_description" class="form-control rounded border border-secondary" rows="3">{{old('meta_description') ?? $category->meta_description }}</textarea>
    <small class="text-danger">{{ $errors->first('meta_description') }}</small>
</div>

