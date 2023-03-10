@extends('layouts.admin')
@section('content')
{{--    <div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                @if (session('message'))--}}
{{--                    <div class="alert alert-success" role="alert">--}}
{{--                        {{ session('message') }}--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3>Category--}}
{{--                            <a href="{{url('admin/category/create')}}" class="btn btn-primary text-white btn-sm float-end">Add Category</a></h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <table class="table table-bordered table-striped">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Status</th>--}}
{{--                                <th>Action</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($categories as $category)--}}
{{--                                <tr>--}}
{{--                                    <td> {{$category->id}}</td>--}}
{{--                                    <td><a href="{{url('admin/category/'.$category->id)}}">{{$category->name}}</a></td>--}}
{{--                                    <td>@if($category->status==0)--}}
{{--                                        Visible--}}
{{--                                    @else--}}
{{--                                        Hidden--}}
{{--                                    @endif--}}
{{--                                    </td>--}}

{{--                                    <td>--}}
{{--                                        <a class="btn btn-dark" href="{{url('admin/category/'.$category->id.'/edit')}}">Edit</a>--}}
{{--                                        <a class="btn btn-danger"   data-toggle="modal"  data-target="#deleteModal-{{$category->id}}">Delete</a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                @include('admin.category.models.delete-category')--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12 d-flex justify-content-center pt-4">--}}
{{--                                {{$categories->links('pagination::bootstrap-4')}}--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
<div class="">
    <livewire:admin.category.index/>
</div>
@endsection
