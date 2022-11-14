
<div wire:ignore.self class="modal fade" id="modal-add-batch-carton-part" tabindex="-1" role="dialog" aria-labelledby="addBatchCartonModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">             
                <h5 class="modal-title" id="addBatchCartonModalLabel">Add Batch Carton</h5>         
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
                            <input type="text" class="form-control" placeholder="Batch Carton Name" name="name" wire:model="name">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Quantity</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="number" class="form-control" placeholder="Batch Carton Quantity" name="quantity" wire:model="quantity">
                            @error('quantity') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label>Batch Bundle</label>        
                        <select wire:model="bundle" class="form-control selectric">
                            <option value="">Select a batch bundle</option>
                            @foreach($bundles as $bundle)
                            <option value="{{ $bundle->id }}">{{ ucfirst($bundle->name) }}</option>
                            @endforeach
                        </select>
                    </div> -->

                    @livewire('dynamic-input', ['model' => 'bundle', 'label' => 'Batch bundle'])

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
            var parent = '#bundle' + newKey + ' > select';
            $(parent).attr('wire:model', selected);
            parent = "#bundle" + newKey + " option[value='selected." + newKey + '.';
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