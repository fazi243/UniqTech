@extends('layouts.admin')
@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Colors
                            <a href="{{url('admin/color/create')}}" class="btn btn-primary text-white btn-sm float-end">Add Color</a></h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($colors as $color)
                                <tr>
                                    <td> {{$color->id}}</td>
                                    <td><a href="{{url('admin/color/'.$color->id)}}">{{$color->name}}</a></td>
                                    <td> {{$color->code}}</td>
                                    <td>@if($color->status==0)
                                        Visible
                                    @else
                                        Hidden
                                    @endif
                                    </td>

                                    <td>
                                        <a class="btn btn-dark" href="{{url('admin/color/'.$color->id.'/edit')}}">Edit</a>
                                        <a class="btn btn-danger"   data-toggle="modal"  data-target="#deleteModal-{{$color->id}}">Delete</a>
                                    </td>
                                </tr>
                                @include('admin.color.models.delete-color')
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center pt-4">
                                {{$colors->links('pagination::bootstrap-4')}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
