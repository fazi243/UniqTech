@extends('layouts.admin')
@section('content')
    <div class="">
        @include('admin.brand.models.create-brand')
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Brand List
                            <a href="#" data-toggle="modal" data-target="#addBrandModal"
                               class="btn btn-primary text-white btn-sm float-end">Add Brand</a></h3>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="brandtable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>{{$brand->slug}}</td>
                                    <td>@if($brand->status==0)
                                            Visible
                                        @else
                                            Hidden
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-dark edit" data-toggle="modal"
                                           data-target="#editBrandModal-{{$brand->id}}" href="#">Edit</a>
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#deleteBrandModal-{{$brand->id}}">Delete</a>
                                    </td>
                                </tr>
                                @include('admin.brand.models.edit-brand')
                                @include('admin.brand.models.delete-brand')
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center pt-4">
                                {{$brands->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
