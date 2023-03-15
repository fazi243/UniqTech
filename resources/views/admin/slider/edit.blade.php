@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Slider
                        <a href="{{url('admin/sliders')}}" class="btn btn-primary btn-sm text-white float-end">Back</a></h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/sliders/'.$slider->id)}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            @include('admin.slider.form')
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary text-white float-end rounded">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
