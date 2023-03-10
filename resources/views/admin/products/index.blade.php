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
                    <h3>Products
                        <a href="{{url('admin/products/create2')}}" class="btn btn-primary text-white btn-sm float-end">Add
                            Product</a></h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>

                                <td> {{$product->id}}</td>
                                <td>
                                    @if($product->category)
                                        {{$product->category->name}}
                                        @else
                                        No Category
                                    @endif

                                </td>
                                <td><a href="{{url('admin/products/'.$product->id)}}">{{$product->name}}</a></td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>@if($product->status==0)
                                        Visible
                                    @else
                                        Hidden
                                    @endif
                                </td>

                                <td>
                                    <a class="btn btn-dark" href="{{url('admin/products/'.$product->id.'/edit')}}">Edit</a>
                                    <a class="btn btn-danger btn-sm text-white"   data-toggle="modal"  data-target="#deleteModal-{{$product->id}}"><i class="mdi mdi-delete "></i></a>
                                </td>
                            </tr>
                            @include('admin.products.models.delete-product')
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center pt-4">
                            {{$products->links('pagination::bootstrap-4')}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
