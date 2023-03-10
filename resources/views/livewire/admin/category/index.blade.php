<div>
    @include('livewire.admin.category.delete-category')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Category<a href="{{url('admin/category/create')}}" class="btn btn-primary text-white btn-sm float-end">Add Category</a></h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td> {{$category->id}}</td>
                                <td><a href="{{url('admin/category/'.$category->id)}}">{{$category->name}}</a></td>
                                <td>@if($category->status==0)
                                        Visible
                                    @else
                                        Hidden
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-dark"
                                       href="{{url('admin/category/'.$category->id.'/edit')}}">Edit</a>
                                    {{--                                    <a class="btn btn-danger" href="{{url('admin/category/'.$category->id.'/delete')}}" onclick="return confirm(' Delete Category\n\n  Are you sure?')" data-toggle="modal" data-target="deleteModal">Delete</a>--}}
                                    <a href="#" wire:click="deleteCategory({{$category->id}})" class="btn btn-danger btn-sm float">
                                        <i class="mdi mdi-delete text-white"></i></a></h3>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('close-modal',()=>{
        $('#deleteModal').modal('toggle');
    })

    window.addEventListener('open-modal',()=>{
        // console.log('hit2');
        $('#deleteModal').modal('toggle');
    })
</script>
