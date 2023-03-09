<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >Add Brands</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeAddModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="storeBrand()">
                <div class="modal-body">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" wire:model.defer="name" name="name"  class="form-control rounded border border-secondary">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" wire:model.defer="slug" name="slug"  class="form-control rounded border border-secondary">
                        <small class="text-danger">{{ $errors->first('slug') }}</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label><br>
                        <select wire:model.defer="status" name="status" class="form-control rounded border border-secondary">
                            <option value="" disabled>Select Brand Status</option>
                            <option value="0" {{ $emptyBrand->status=='Visible'?'selected':'' }}>Visible</option>
                            <option value="1" {{ $emptyBrand->status=='Hidden'?'selected':'' }}>Hidden</option>
                        </select>
                        <small class="text-danger">{{ $errors->first('status') }}</small>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeAddModal()">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
