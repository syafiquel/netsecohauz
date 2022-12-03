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

        <div class="form-group">
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