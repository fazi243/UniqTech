@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Edit Product
                        <a href="{{url('admin/products')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/products/'.$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home-tab-pane" type="button" role="tab"
                                        aria-controls="home-tab-pane" aria-selected="true">
                                    Home
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotag-tab" data-bs-toggle="tab"
                                        data-bs-target="#seotag-tab-pane" type="button" role="tab"
                                        aria-controls="seotag-tab-pane" aria-selected="false">
                                    SEO Tags
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                        data-bs-target="#details-tab-pane" type="button" role="tab"
                                        aria-controls="details-tab-pane" aria-selected="false">
                                    Details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="images-tab" data-bs-toggle="tab"
                                        data-bs-target="#images-tab-pane" type="button" role="tab"
                                        aria-controls="images-tab-pane" aria-selected="false">
                                    Images
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                        data-bs-target="#color-tab-pane" type="button" role="tab"
                                        aria-controls="color-tab-pane" aria-selected="false">
                                    Product Colors
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                 aria-labelledby="home-tab" tabindex="0">
                                <div class="col-md-12 my-3">
                                    <label for="" class="form-label">Category</label>
                                    <select name="category_id"
                                            class="form-control rounded border border-secondary @error('category_id') is-invalid @enderror">
                                        <option disabled>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                    }} {{$category->id == $product->category->id ? 'selected':''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">{{ $errors->first('category_id') }}</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" value="{{old('name') ?? $product->name }}"
                                           class="form-control rounded border border-secondary @error('name') is-invalid @enderror">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" name="slug" value="{{old('slug') ?? $product->slug }}"
                                           class="form-control rounded border border-secondary @error('slug') is-invalid @enderror">
                                    <small class="text-danger">{{ $errors->first('slug') }}</small>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Brand</label>
                                    <select name="brand"
                                            class="form-control rounded border border-secondary @error('brand') is-invalid @enderror">
                                        <option disabled>Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option
                                                value="{{$brand->id}}" {{$brand->id == $product->brand ? 'selected':''}}>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">{{ $errors->first('brand') }}</small>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Small Description</label>
                                    <textarea name="small_description"
                                              class="form-control rounded border border-secondary @error('small_description') is-invalid @enderror"
                                              rows="3">{{old('small_description')?? $product->small_description }}</textarea>
                                    <small class="text-danger">{{ $errors->first('small_description') }}</small>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description"
                                              class="form-control rounded border border-secondary @error('description') is-invalid @enderror"
                                              rows="4">{{old('description')?? $product->description }}</textarea>
                                    <small class="text-danger">{{ $errors->first('description') }}</small>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab"
                                 tabindex="0">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title"
                                           value="{{old('meta_title')?? $product->meta_title}}"
                                           class="form-control rounded border border-secondary @error('meta_title') is-invalid @enderror">
                                    <small class="text-danger">{{ $errors->first('meta_title') }}</small>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Meta Keyword</label>
                                    <textarea name="meta_keyword"
                                              class="form-control rounded border border-secondary @error('meta_keyword') is-invalid @enderror"
                                              rows="3">{{old('meta_keyword')?? $product->meta_keyword }}</textarea>
                                    <small class="text-danger">{{ $errors->first('meta_keyword') }}</small>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Meta Description</label>
                                    <textarea name="meta_description"
                                              class="form-control rounded border border-secondary @error('meta_description') is-invalid @enderror"
                                              rows="3">{{old('meta_description')?? $product->meta_description  }}</textarea>
                                    <small class="text-danger">{{ $errors->first('meta_description') }}</small>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="details-tab-pane" role="tabpanel"
                                 aria-labelledby="details-tab"
                                 tabindex="0">
                                <div class="col-md-6 mb-3">
                                    <label for="original_price" class="form-label">Original Price</label>
                                    <input type="number" id="replyNumber" min="0" data-bind="value:replyNumber"
                                           name="original_price"
                                           value="{{old('original_price')?? $product->original_price }}"
                                           class="form-control rounded border border-secondary @error('original_price') is-invalid @enderror">
                                    <small class="text-danger">{{ $errors->first('original_price') }}</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="selling_price" class="form-label">Selling Price</label>
                                    <input type="number" id="replyNumber" min="0" data-bind="value:replyNumber"
                                           name="selling_price"
                                           value="{{old('selling_price')?? $product->selling_price}}"
                                           class="form-control rounded border border-secondary @error('selling_price') is-invalid @enderror">
                                    <small class="text-danger">{{ $errors->first('selling_price') }}</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quantity" class="form-label">quantity</label>
                                    <input type="number" id="replyNumber" min="0" data-bind="value:replyNumber"
                                           name="quantity" value="{{old('quantity')?? $product->quantity }}"
                                           class="form-control rounded border border-secondary @error('quantity') is-invalid @enderror">
                                    <small class="text-danger">{{ $errors->first('quantity') }}</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="trending" class="form-label">Trending</label><br>
                                    <select name="trending"
                                            class="form-control rounded border border-secondary @error('trending') is-invalid @enderror">
                                        <option disabled>Select Trending Status</option>
                                        <option value="0" {{$product->trending == '0' ? 'selected':''}}>Not Trending
                                        </option>
                                        <option value="1" {{$product->trending == '1' ? 'selected':''}}>Trending
                                        </option>
                                    </select>
                                    <small class="text-danger">{{ $errors->first('trending') }}</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label">Status</label><br>
                                    <select name="status"
                                            class="form-control rounded border border-secondary @error('status') is-invalid @enderror">
                                        <option disabled>Select Product Status</option>
                                        <option value="0" {{$product->status == '0' ? 'selected':''}}>Visible</option>
                                        <option value="1" {{$product->trending == '1' ? 'selected':''}}>Hidden</option>
                                    </select>
                                    <small class="text-danger">{{ $errors->first('status') }}</small>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="images-tab-pane" role="tabpanel"
                                 aria-labelledby="images-tab" tabindex="0">
                                <div class="col-md-12 my-3">
                                    <label for="file" class="form-label mt-2">Upload Product Images:</label>
                                    <input type="file" name="image[]" multiple accept="/image/*"
                                           class="form-control @error('image') is-invalid @enderror">
                                    <small class="text-danger">{{ $errors->first('image') }}</small>
                                </div>
                                <div class="row">
                                    @if($product->productImages)
                                        @foreach($product->productImages as $image)
                                            <div class="col-md-2 my-3 float-start gallery">
                                                <img class=" me-4 border rounded thumbnail zoom"
                                                     style="width: 80px; height: 80px;"
                                                     src="{{asset('storage/product_image/'.$image->image)}}" alt="">
                                                <a href="{{url('/admin/products/'.$image->id.'/delete')}}"
                                                   style="width: 80px;"
                                                   class="d-block btn btn-sm btn-outline-danger "><i
                                                        class="mdi mdi-delete "></i></a>
                                            </div>
                                        @endforeach
                                    @else
                                        <h5>No Image Added</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="color-tab-pane" role="tabpanel"
                                 aria-labelledby="color-tab"
                                 tabindex="0">
                                <div class="col-md-12 mb-3">
                                    <label for="color" class="form-label">Select Color</label>
                                    <div class="row ">
                                        @forelse( $colors as $color)
                                            <div class="col-md-3  ">
                                                {{--                                            <div class="col-md-3 rounded border border-secondary" style="background-color:{{$color->code}};">--}}
                                                <div class="p-2 mb-3 rounded border border-secondary">
                                                    Color: <input type="checkbox"
                                                                  name="colors[{{$color->id}}]" value="{{$color->id}}"
                                                                  class="rounded border border-secondary ">{{$color->name}}
                                                    <br>
                                                    Quantity: <input type="number"
                                                                     name="color_quantity[{{$color->id}}]"
                                                                     style="width: 70px; border: 1px solid" value=""
                                                                     class="rounded border border-secondary ">
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">No Color Found</div>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Color Name</th>
                                            <th>Quantity</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product->productColors as $productcolor)
                                            <tr CLASS="product-color-tr">
                                                <td>
                                                    @if($productcolor->color)
                                                        {{$productcolor->color->name}}
                                                    @else
                                                        Color Not Found
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="input-group mb-3" style="width: 150px ">
                                                        <input type="text" value="{{$productcolor->color_quantity}}"
                                                               class="productColorQuantity form-control border border-primary form-control-sm">
                                                        <button type="button" value="{{$productcolor->id}}"
                                                                class="updateProductColorBtn btn btn-sm btn-primary text-white">
                                                            Update
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" value="{{$productcolor->id}}"
                                                            class="deleteProductColorBtn btn btn-sm btn-danger text-white">
                                                        Delete
                                                    </button>

                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script !src="">
        $(document).ready(function () {
            $(document).on('click', '.updateProductColorBtn', function () {
                var product_id = "{{$product->id}}";
                var product_color_id = $(this).val();
                var qty = $(this).closest('.product-color-tr').find('.productColorQuantity').val();
                // alert(product_color_id);
                if (qty <= 0) {
                    alert('Quantity is required')
                    return false;
                }
                vat data={
                    'product_id':product_id,
                    'product_color_id':product_color_id,
                    'qty':qty
                }
            });
        });
    </script>
@endsection
