<div wire:ignore.self>
    <form>
        <div class="form-divider">
            Batch Palette Information
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
                    <label for="carton">Batch Carton</label>
                    <select wire:model="carton" class="form-control selectric">
                        <option value="">Select a Batch Carton</option>
                        @foreach($cartons as $carton)
                        @if($carton == $selected_carton)
                        <option selected value="{{ $carton }}">{{ ucfirst($carton) }}</option>
                        @else
                        <option value="{{ $carton }}">{{ ucfirst($carton) }}</option>
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