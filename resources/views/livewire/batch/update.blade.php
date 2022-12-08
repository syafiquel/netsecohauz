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
                    <label for="unit_quantity">Unit Quantity</label>
                    <input id="unit_quantity" type="number" class="form-control" name="unit_quantity" wire:model="unit_quantity">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-6">
                    <label for="brand_owner">Brand Owner</label>
                    <select name="sel_palette" wire:model="brand_owner" class="form-control selectric">
                        <option value="">Select a Brand Owner</option>
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
        </div>

        <div class="form-group">
            <label>Batch Status</label>        
            <select wire:model="status" class="form-control selectric">
                <option value="">Select a batch status</option>
                @foreach($statuses as $status)
                <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                @endforeach
            </select>
        </div>

        <div x-data="{ is_update: $wire.entangle('calendar_update') }">
            <template x-if="!is_update">
                <x-date-picker x-init="if ($('.datepicker-manufactured').length) {
                    $('.datepicker-manufactured').daterangepicker({
                            locale: {
                            format: 'DD-MM-YYYY'
                        },
                        singleDatePicker: true
                        }, function(start, end, label){
                            console.log(start);
                            $wire.set('manufactured_date', start.format('DD-MM-YYYY'));
                        }
                    );
                }" wire:model.defer="manufactured_date" id="manufactured_date" autocomplete="off" class="form-control datepicker-manufactured">
                    <label>Manufactured Date</label>
                </x-date-picker>
            </template>
            <template x-if="is_update">
                <x-date-picker x-init="if ($('.datepicker-manufactured').length) {
                    var startDate = $wire.get('manufactured_date');
                    $('.datepicker-manufactured').daterangepicker({ 
                        singleDatePicker: true,
                        locale: {
                            format: 'DD-MM-YYYY'
                        },
                        startDate: startDate,
                        }, function(start, end, label) {
                            $wire.set('manufactured_date', start.format('DD-MM-YYYY'));
                        }
                    ); 
                }" wire:model.defer="manufactured_date" id="manufactured_date" autocomplete="off" class="form-control datepicker-manufactured">
                    <label>Manufactured Date</label>
                </x-date-picker>
            </template>
        </div>

        <div x-data="{ is_update: $wire.entangle('calendar_update') }">
            <template x-if="!is_update">
                <x-date-picker x-init="if ($('.datepicker-expired').length) {
                    $('.datepicker-expired').daterangepicker({
                            locale: {
                            format: 'DD-MM-YYYY'
                        },
                        singleDatePicker: true
                        }, function(start, end, label){
                            $wire.set('expired_date', start.format('DD-MM-YYYY'));
                        }
                    );
                }" wire:model.defer="expired_date" id="expired_date" autocomplete="off" class="form-control datepicker-expired">
                    <label>Expired Date</label>
                </x-date-picker>
            </template>
            <template x-if="is_update">
                <x-date-picker  x-init="if ($('.datepicker-expired').length) {
                    var startDate = $wire.get('expired_date');
                    $('.datepicker-expired').daterangepicker({ 
                        locale: {
                            format: 'DD-MM-YYYY'
                        },
                        startDate: startDate,
                        singleDatePicker:true,
                        }, function(start, end, label){
                            console.log('called');
                            $wire.set('expired_date', start.format('DD-MM-YYYY'));
                        }
                    );
                }" wire:model.defer="expired_date" id="expired_date" autocomplete="off" class="form-control datepicker-expired">
                    <label>Expired Date</label>
                </x-date-picker>
            </template>
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