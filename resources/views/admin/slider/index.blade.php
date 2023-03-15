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
                        <h3>Slider
                            <a href="{{url('admin/sliders/create3')}}"
                               class="btn btn-primary text-white btn-sm float-end">Add Slider</a></h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td> {{$slider->id}}</td>
                                    <td><a href="{{url('admin/sliders/'.$slider->id)}}">{{$slider->title}}</a></td>
                                    <td> {{$slider->description}}</td>
                                    <td><img src="{{ asset('storage/'.$slider->image) }}" class=""
                                             alt="Responsive image" style="width:70px; height:70px;" ></td>
                                    <td>@if($slider->status==0)
                                            Visible
                                        @else
                                            Hidden
                                        @endif
                                    </td>

                                    <td>
                                        <a class="btn btn-dark" href="{{url('admin/sliders/'.$slider->id.'/edit')}}">Edit</a>
                                        <a class="btn btn-danger" data-toggle="modal"
                                           data-target="#deleteModal-{{$slider->id}}">Delete</a>
                                    </td>
                                </tr>
                                @include('admin.slider.models.delete-slider')
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center pt-4">
                                {{$sliders->links('pagination::bootstrap-4')}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
