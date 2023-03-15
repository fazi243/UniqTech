@extends('layouts.admin')
@section('content')
    <div class="">
        @include('admin.slider.models.delete-slider')
        <div class="card">
            <div class="card-header">
                <h3>{{$slider->title}}
                    <a href="{{url('admin/sliders')}}" class="btn btn-primary ms-2 text-white float-end">Back</a>
                    <a class="btn btn-dark ms-2  float-end" href="{{url('admin/sliders/'.$slider->id.'/edit')}}">Edit</a>
                    <a class="btn btn-danger ms-2 btn-sm float-end"   data-toggle="modal"  data-target="#deleteModal-{{$slider->id}}"><i class="mdi mdi-delete text-white"></i></a>
                    <a href="{{url('admin/sliders/create')}}" class="btn btn-primary rounded-circle text-white btn-sm float-end"><i class="mdi mdi-plus "></i></a></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @if ($slider->image)
                        <div class="Col-sm">
                            <img src="{{ asset('storage/'.$slider->image) }}"  width="25%" height="25%  " class="img-thumbnail"
                                 alt="Responsive image">
                        </div>
                    @else
                        <h5>No Image Added</h5>
                    @endif
                </div>
                <div class="row mt-4 border-secondary border-bottom">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Description:</h4></div>
                    <div class="col-sm">{{$slider->description}}</div>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Status:</h4></div>
                    <div class="col-sm">
                        @if($slider->status==0)
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
