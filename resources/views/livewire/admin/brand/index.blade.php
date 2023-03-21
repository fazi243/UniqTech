<div class="">
    @include('livewire.admin.brand.add-brand-modal')
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
                        <a href="#" wire:click="showAddModal"
                           class="btn btn-primary text-white btn-sm float-end">Add Brand</a></h3>
                    </h3>
                </div>
                <div class="card-body">
                    <table id="brandtable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
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
                                <td>
                                    @if($brand->category)
                                        {{$brand->category->name}}
                                    @else
                                        No Category
                                    @endif
                                    </td>
                                <td>{{$brand->slug}}</td>
                                <td>@if($brand->status==0)
                                        Visible
                                    @else
                                        Hidden
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-dark edit" wire:click="openUpdateModal({{$brand->id}})" data-toggle="modal" data-target="#updateBrandModal" >Edit</a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteBrandModal"
                                       wire:click="deleteBrand({{$brand->id}})"
                                    >Delete</a>
                                </td>
                            </tr>
                            @include('livewire.admin.brand.edit-brand-modal')
                            @include('livewire.admin.brand.delete-brand-modal')
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center pt-4">
                            {{$brands->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--@push('script')--}}
    <script>
        window.addEventListener('add-modal',()=>{
            $('#addBrandModal').modal('toggle');
        })

    window.addEventListener('delete-modal',()=>{
        // console.log('hit1')
        // $('#deleteBrandModal').modal('toggle');
        $('.modal-backdrop').remove();
    })
        window.addEventListener('update-modal',()=>{
            // console.log('hit1')
            // $('#updateBrandModal').modal('toggle');
            $('.modal-backdrop').remove();
        })
</script>
{{--@endpush--}}
