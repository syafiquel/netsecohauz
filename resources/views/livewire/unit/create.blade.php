
<div wire:ignore.self class="modal fade" id="modal-add-batch-unit-part" tabindex="-1" role="dialog" aria-labelledby="addBatchUnitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">             
                <h5 class="modal-title" id="addBatchUnitModalLabel">Add Batch Unit</h5>         
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">               
                    <span aria-hidden="true">×</span>             
                </button>           
            </div>
            <div class="modal-body">           
                <form class="">

                    <div class="form-group">
                        <label>Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="text" class="form-control" placeholder="Batch Unit Name" name="name" wire:model="name">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Quantity</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="number" class="form-control" placeholder="Batch Unit Quantity" name="quantity" wire:model="quantity">
                            @error('quantity') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-mobile"></i></div>
                            </div>
                            <input type="text" class="form-control" placeholder="Description" name="description" wire:model="description">
                            @error('description') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Remark</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-mobile"></i></div>
                            </div>
                            <input type="text" class="form-control" placeholder="Remark" name="remark" wire:model="remark">
                            @error('remark') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </form>
            </div>  
            <div class="modal-footer bg-whitesmoke">           
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Submit</button>
            </div>   
        </div>
    </div>
</div>