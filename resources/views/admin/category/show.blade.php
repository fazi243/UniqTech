@extends('layouts.admin')
@section('content')
    <div class="">
        @include('admin.category.models.delete-category')
        <div class="card">
            <div class="card-header">
                <h3>{{$category->name}}
                    <a class="btn btn-dark ms-2 btn-sm float-end" href="{{url('admin/category/'.$category->id.'/edit')}}">Edit</a>
                    <a class="btn btn-danger ms-2 btn-sm float-end"   data-toggle="modal"  data-target="#deleteModal-{{$category->id}}">Delete</a>
                    <a href="{{url('admin/category/create')}}" class="btn btn-primary text-white btn-sm float-end">Add Category</a></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @if ($category->image)
                        <div class="Col-sm">
                            <img src="{{ asset('storage/'.$category->image) }}" class="img-thumbnail"
                                 alt="Responsive image">
                        </div>
                    @endif
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Slug:</h4></div>
                    <div class="col-sm">{{$category->slug}}</div>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Description:</h4></div>
                    <div class="col-sm">{{$category->description}}</div>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Status:</h4></div>
                    <div class="col-sm">
                        @if($category->status==0)
                            Visible
                        @else
                            Hidden
                        @endif
                    </div>
                </div>
                <div class="row mt-4 ">
                    <h3>SEO TAGS</h3>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Meta Title:</h4></div>
                    <div class="col-sm">{{$category->meta_title}}</div>
                </div>
                <div class="row mt-4 border-secondary border-bottom">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Meta Keyword:</h4></div>
                    <div class="col-sm">{{$category->meta_keyword}}</div>
                </div>
                <div class="row mt-4 border-bottom border-secondary">
                    <div class="col-sm-3"><h4 class="font-weight-bold">Meta Description:</h4></div>
                    <div class="col-sm">{{$category->meta_description}}</div>
                </div>
            </div>
        </div>
    </div>

@endsection
