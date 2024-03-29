<div wire:ignore class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="confirmationModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">             
                <h5 class="modal-title" id="confirmationModal">Action</h5>         
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">               
                    <span aria-hidden="true">×</span>             
                </button>           
            </div>
            <div class="modal-body">           
                <p>Modal Message</p>
            </div>  
            <div class="modal-footer bg-whitesmoke">           
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button id="btn" wire:click="delete()" type="button" class="btn btn-primary close-modal">Action</button>
            </div>   
        </div>
    </div>
</div>
@once
    @push('page_script')
    <script type="text/javascript">
        window.livewire.on('open-confirm-modal', data => {
            var param = {};
            param.type = data.type;
            param.id = data.id;
            if(data.data !== undefined)
                param.data = data.data;
            $('div > p').text(data.message);
            $('#modal-confirm').modal('show');
            var livewireId = $('#modal-confirm').attr('wire:id');
            window.livewire.find(livewireId).set('data', param);
            // $('#btn').click(function() {
            //     window.livewire.emit('delete-event', param);
            // });
        });
    </script>
    @endpush
@endonce