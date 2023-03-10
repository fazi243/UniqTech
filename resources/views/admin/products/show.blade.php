@extends('layouts.admin')
@section('content')
    <div class="">
        @include('admin.products.models.delete-product')
        <div class="card">
            <div class="card-header">
                <h3>{{$product->name}}
                    <a href="{{url('admin/products')}}" class="btn btn-primary ms-2 text-white float-end">Back</a>
                    <a class="btn btn-dark ms-2  float-end" href="{{url('admin/products/'.$product->id.'/edit')}}">Edit</a>
                    <a class="btn btn-danger ms-2 btn-sm float-end"   data-toggle="modal"  data-target="#deleteModal-{{$product->id}}"><i class="mdi mdi-delete text-white"></i></a>
                    <a href="{{url('admin/products/create2')}}" class="btn btn-primary rounded-circle text-white btn-sm float-end"><i class="mdi mdi-plus "></i></a></h3>
            </div>
            <div class="card-body">
                <div class="row gallery">
                    @if($product->productImages)
                        @foreach($product->productImages as $image)

                            <img class=" me-4 border rounded thumbnail zoom" style="width: 80px; height: 80px;"  src="{{asset('storage/product_image/'.$image->image)}}" alt="">
                        @endforeach
                    @else
                        <h5>No Image Added</h5>
                    @endif
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Category:</h4></div>
                    <div class="col-sm">{{$product->category->name}}</div>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Brand:</h4></div>
                    <div class="col-sm">{{$brandname->name}}</div>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Slug:</h4></div>
                    <div class="col-sm">{{$product->slug}}</div>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Quantity:</h4></div>
                    <div class="col-sm">{{$product->quantity}}</div>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Small Description:</h4></div>
                    <div class="col-sm">{{$product->small_description}}</div>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Description:</h4></div>
                    <div class="col-sm">{{$product->description}}</div>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Status:</h4></div>
                    <div class="col-sm">
                        @if($product->status==0)
                            Visible
                        @else
                            Hidden
                        @endif
                    </div>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Trending Status:</h4></div>
                    <div class="col-sm">
                        @if($product->trending==0)
                            Not Trending
                        @else
                            Trending
                        @endif
                    </div>
                </div>
                <div class="row mt-4 ">
                    <h3>SEO TAGS</h3>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Meta Title:</h4></div>
                    <div class="col-sm">{{$product->meta_title}}</div>
                </div>
                <div class="row mt-4 border-secondary border-bottom">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Meta Keyword:</h4></div>
                    <div class="col-sm">{{$product->meta_keyword}}</div>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Meta Description:</h4></div>
                    <div class="col-sm">{{$product->meta_description}}</div>
                </div>
                <div class="row mt-4 ">
                    <h3>Price Details</h3>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Original Price:</h4></div>
                    <div class="col-sm">{{$product->original_price}}</div>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Selling Price:</h4></div>
                    <div class="col-sm">{{$product->selling_price}}</div>
                </div>

            </div>
        </div>
    </div>

@endsection
