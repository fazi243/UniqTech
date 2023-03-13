@extends('layouts.admin')
@section('content')
    <div class="">
        @include('admin.color.models.delete-color')
        <div class="card">
            <div class="card-header">
                <h3>{{$color->name}}
                    <a href="{{url('admin/color')}}" class="btn btn-primary ms-2 text-white float-end">Back</a>
                    <a class="btn btn-dark ms-2  float-end" href="{{url('admin/color/'.$color->id.'/edit')}}">Edit</a>
                    <a class="btn btn-danger ms-2 btn-sm float-end"   data-toggle="modal"  data-target="#deleteModal-{{$color->id}}"><i class="mdi mdi-delete text-white"></i></a>
                    <a href="{{url('admin/color/create')}}" class="btn btn-primary rounded-circle text-white btn-sm float-end"><i class="mdi mdi-plus "></i></a></h3>
            </div>
            <div class="card-body">
                <div class="row mt-4 border-secondary border-bottom">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Code:</h4></div>
                    <div class="col-sm">{{$color->code}}</div>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Status:</h4></div>
                    <div class="col-sm">
                        @if($color->status==0)
                            Visible
                        @else
                            Hidden
                        @endif
                    </div>
                </div>




            </div>
        </div>
    </div>

@endsection
