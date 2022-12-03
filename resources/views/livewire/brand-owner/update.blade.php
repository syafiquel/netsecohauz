<div wire:ignore.self>
    <form>
        <div class="form-divider">
            Company Information
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" autofocus wire:model="name">
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="form-group col-6">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" wire:model="email">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-6">
                    <label for="phone">Phone</label>
                    <input id="phone" type="text" class="form-control" name="phone" wire:model="phone">
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        </div>

        <div class="form-divider">
            Company
        </div>
        <div class="row">
            <div class="form-group col-6">
            <label>Website</label>
                <input id="website" type="text" class="form-control" name="website" wire:model="website">
                <div class="invalid-feedback"></div>
            </div>
        </div>

        <div class="form-divider">
            Address
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="address_1" class="d-block">Address 1</label>
                <input id="address_1" type="text" class="form-control" name="address_1" wire:model="address_1">
            </div>
            <div class="form-group col-6">
                <label for="address_2" class="d-block">Address 2</label>
                <input id="address_2" type="text" class="form-control" name="address_2" wire:model="address_2">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label>Country</label>
                <select wire:model="country" class="form-control selectric">
                    <option value="malaysia">{{ $country ?? 'Malaysia' }}</option>
                </select>
            </div>
            <div class="form-group col-6">
                <label>State</label>
                <select wire:model="state" class="form-control selectric">
                    <option value="">Select a state</option>
                    @foreach($states as $state)
                    @if($state == $selected_state)
                    <option selected value="{{ $state }}">{{ ucfirst($state) }}</option>
                    @else
                    <option value="{{ $state }}">{{ ucfirst($state) }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label>City</label>
                <input type="text" class="form-control" name="city" wire:model="city">
            </div>
            <div class="form-group col-6">
                <label>Postcode</label>
                <input type="text" class="form-control" name="postcode" wire:model="postcode">
            </div>
        </div>

        <div class="form-group">
            <button type="button" wire:click.prevent="save()" class="btn btn-primary btn-lg btn-block">
                Update
            </button>
        </div>
    </form>
</div>