
<div wire:ignore.self class="modal fade" id="modal-add-product-part" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">             
                <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>         
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
                            <input type="text" class="form-control" placeholder="Product name" name="name" wire:model="name">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select wire:model="category" class="form-control selectric">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                            @if($category == $selected_category)
                            <option selected value="{{ $category->name }}">{{ ucfirst($category->name) }}</option>
                            @else
                            <option value="{{ $category->name }}">{{ ucfirst($category->name) }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Industry</label>
                        <select wire:model="industry" class="form-control selectric">
                            <option value="">Select an industry</option>
                            @foreach($industries as $industry)
                            @if($industry == $selected_industry)
                            <option selected value="{{ $industry->name }}">{{ ucfirst($industry->name) }}</option>
                            @else
                            <option value="{{ $industry->name }}">{{ ucfirst($industry->name) }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Brand Owner</label>
                        <select wire:model="brand_owner" class="form-control selectric">
                            <option value="">Select a brand owner</option>
                            @foreach($brand_owners as $brand_owner)
                            @if($brand_owner == $selected_brand_owner)
                            <option selected value="{{ $brand_owner->name }}">{{ ucfirst($brand_owner->name) }}</option>
                            @else
                            <option value="{{ $brand_owner->name }}">{{ ucfirst($brand_owner->name) }}</option>
                            @endif
                            @endforeach
                        </select>
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