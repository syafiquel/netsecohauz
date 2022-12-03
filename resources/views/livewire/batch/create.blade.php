
<div wire:ignore.self class="modal fade" id="modal-add-batch-part" tabindex="-1" role="dialog" aria-labelledby="addBatchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">             
                <h5 class="modal-title" id="addBatchModalLabel">Add Batch</h5>         
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
                            <input type="text" class="form-control" placeholder="Batch Name" name="name" wire:model="name">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Total Units Quantity</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="number" class="form-control" placeholder="Total Unit Quantity" name="total_unit_quantity" wire:model="total_unit_quantity">
                            @error('total_unit_quantity') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <label>Units per Batch Quantity</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="number" class="form-control" placeholder="Units per Batch Quantity" name="batch_unit_quantity" wire:model="batch_unit_quantity">
                            @error('batch_unit_quantity') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Brand Owner</label>        
                        <select wire:model="brand_owner" class="form-control selectric">
                            <option value="">Select a brand owner</option>
                            @foreach($brand_owners as $brand_owner)
                            <option value="{{ $brand_owner->id }}">{{ ucfirst($brand_owner->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- @livewire('dynamic-input', ['model' => 'palette', 'label' => 'Batch Palette']) --}}

                    <x-date-picker x-init="if ($('.datepicker-manufactured').length) {
                        $('.datepicker-manufactured').daterangepicker({
                                locale: {
                                format: 'DD-MM-YYYY'
                            },
                            singleDatePicker: true
                            }, function(start, end, label){
                                $wire.set('manufactured_date', start.format('DD-MM-YYYY'));
                            });
                        }" wire:model.defer="manufactured_date" id="manufactured_date" autocomplete="off" class="form-control datepicker-manufactured">
                        <label>Manufactured Date</label>
                    </x-date-picker>

                    <x-date-picker x-init="if ($('.datepicker-expired').length) {
                        $('.datepicker-expired').daterangepicker({
                                locale: {
                                format: 'DD-MM-YYYY'
                            },
                            singleDatePicker: true
                            }, function(start, end, label){
                                $wire.set('expired_date', start.format('DD-MM-YYYY'));
                            });
                        }" wire:model.defer="expired_date" id="expired_date" autocomplete="off" class="form-control datepicker-expired">
                    <label>Expired Date</label>
                    </x-date-picker>

                    <div class="form-group">
                        <label>Batch Status</label>        
                        <select wire:model="status" class="form-control selectric">
                            <option value="">Select a batch status</option>
                            @foreach($statuses as $status)
                            <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
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


@push('page_script')
<script type="text/javascript">

    'use strict';

    function constructDropDown(data)
    {
        for (const [key, value] of Object.entries(data)) {

            var newKey = key.substring(3,4);
            var mid = parseInt(value) - 1;
            var selected = 'selected.' + newKey;
            var parent = '#palette' + newKey + ' > select';
            $(parent).attr('wire:model', selected);
            parent = "#palette" + newKey + " option[value='selected." + newKey + '.';
            var el = parent + mid + '.' + value + "']";
            $(el).prop('selected', 'true');
        }
        window.livewire.rescan();
    }

    window.addEventListener('init-dropdown', event => {
        constructDropDown(event.detail.data);
    });
    
</script>
@endpush