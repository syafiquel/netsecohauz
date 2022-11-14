<div wire:ignore.self>
    <form>
        <div class="form-divider">
            Manage Batch Information
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" autofocus wire:model="name">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="palette_quantity">Palette Quantity</label>
                <input id="palette_quantity" type="number" class="form-control" name="palette_quantity" wire:model="palette_quantity">
                <div class="invalid-feedback"></div>
            </div> 
            <div class="form-group col-6">
                <label for="palette">Batch Palette</label>
                <select name="sel_palette" wire:model="palette" class="form-control selectric">
                    <option value="">Select a Batch Palette</option>
                    @foreach($palettes as $key => $paletter)
                    @if($key == $selected_palette)
                    <option selected value="{{ $paletter }}">{{ ucfirst($paletter) }}</option>
                    @else
                    <option value="{{ $paletter }}">{{ ucfirst($paletter) }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="status">Batch Status</label>
                <select wire:model="status" class="form-control selectric">
                    <option value="">Select a batch status</option>
                    @foreach($statuses as $status)
                    @if($status == $selected_status)
                    <option selected value="{{ $status }}">{{ ucfirst($status) }}</option>
                    @else
                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label for="brand_owner">Batch Brand Owner</label>
                <select wire:model="brand_owner" class="form-control selectric">
                    <option value="">Select a brand owner</option>
                    @foreach($brand_owners as $brand_owner)
                    @if($brand_owner == $selected_brand_owner)
                    <option selected value="{{ $brand_owner }}">{{ ucfirst($brand_owner) }}</option>
                    @else
                    <option value="{{ $brand_owner }}">{{ ucfirst($brand_owner) }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        

        <div class="row">
            <div class="form-group col-12">
                <label for="description">Description</label>
                <input id="description" type="text" class="form-control" name="description" autofocus wire:model="description">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                <label for="remark">Remark</label>
                <input id="remark" type="text" class="form-control" name="remark" autofocus wire:model="remark">
            </div>
        </div>
        
        <div class="form-group">
            <button type="button" wire:click.prevent="save()" class="btn btn-primary btn-lg btn-block">
                Update
            </button>
        </div>
    </form>
</div>