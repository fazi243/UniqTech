@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Color
                        <a href="{{url('admin/color')}}" class="btn btn-primary btn-sm text-white float-end">Back</a></h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/color')}}" method="post" >
                        @csrf
                        <div class="row">
                            @include('admin.color.form')
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
