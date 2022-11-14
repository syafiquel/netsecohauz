<div wire:ignore.self>
    <form>
        <div class="form-divider">
            Batch Carton Information
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" autofocus wire:model="name">
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="form-group col-6">
                    <label for="quantity">Quantity</label>
                    <input id="quantity" type="number" class="form-control" name="quantity" wire:model="quantity">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-6">
                    <label for="bundle">Batch Bundle</label>
                    <select wire:model="bundle" class="form-control selectric">
                        <option value="">Select a Batch Bundle</option>
                        @foreach($bundles as $bundle)
                        @if($bundle == $selected_bundle)
                        <option selected value="{{ $bundle }}">{{ ucfirst($bundle) }}</option>
                        @else
                        <option value="{{ $bundle }}">{{ ucfirst($bundle) }}</option>
                        @endif
                        @endforeach
                </select>
                </div>
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