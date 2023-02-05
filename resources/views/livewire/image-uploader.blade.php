<div>
    <div class="row">
        <div class="form-group col-12">
            <label for="photos">{{ $label }}</label>
            <input class="form-control" type="file" wire:model="image" multiple>
            @error('photos.*') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
</div>
