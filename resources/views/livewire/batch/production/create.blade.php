
<div wire:ignore.self class="modal fade" id="modal-add-batch-prod-part" tabindex="-1" role="dialog" aria-labelledby="addBatchProdModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">             
                <h5 class="modal-title" id="addBatchProdModalLabel">Add Batch</h5>         
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">               
                    <span aria-hidden="true">×</span>             
                </button>           
            </div>
            <div class="modal-body">           
                <form class="">
                    <div class="form-group">
                        <label>Batch</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <x-datalist :lists="json_encode($batches)" :model="$model" :placeholder="$placeholder"></x-datalist>
                        </div>    
                        <label>Total Product Quantity</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="number" class="form-control" placeholder="Total Product Quantity" name="total_product_quantity" wire:model="total_product_quantity">
                            @error('total_product_quantity') <span class="error">{{ $message }}</span> @enderror
                        </div>    
                    </div>

                    <div class="form-group">                        
                        <label>Products per Palette Quantity</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="number" class="form-control" placeholder="Products per Palette Quantity" name="products_per_palette_quantity" wire:model="products_per_palette_quantity">
                            @error('products_per_palette_quantity') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <label>Products per Carton Quantity</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="number" class="form-control" placeholder="Products per Carton Quantity" name="products_per_carton_quantity" wire:model="products_per_carton_quantity">
                            @error('products_per_carton_quantity') <span class="error">{{ $message }}</span> @enderror
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
                </form>
            </div>  
            <div class="modal-footer bg-whitesmoke">           
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Submit</button>
            </div>   
        </div>
    </div>
</div>

