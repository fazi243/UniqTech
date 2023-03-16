@extends('layouts.app')
@section('title','All Products')
@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>
                @forelse($products as $product)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if($product->quantity<=0)
                                    <label class="stock bg-danger">Out of Stock</label>
                                @else
                                    <label class="stock bg-success">In Stock</label>
                                @endif
                                    <a href="{{url('/collections/'.$product->category->slug.'/'.$product->slug)}}">

                                    @if($product->productImages->count() > 0)

                                    <img src="{{asset('storage/product_image/'.$product->productImages[0]->image)}}" alt="{{$product->name}}">
                                @endif
                            </div>
                            <div class="product-card-body">
                                <br>
                                <p class="product-brand">{{$product->brandinfo->name}}</p>
                                <h5 class="product-name">
                                        {{$product->name}}

                                </h5>
                                </a>
                                <div>
                                    <span class="selling-price">${{$product->selling_price}}</span>
                                    <span class="original-price">${{$product->original_price}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <h5>No Products Available for {{$category->name}} </h5>
                @endforelse

            </div>
        </div>
    </div>

@endsection
