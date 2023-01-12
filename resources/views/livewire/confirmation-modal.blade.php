<div wire:ignore.self class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="confirmationModal" aria-hidden="true">
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
                <button id="btn" type="button" class="btn btn-primary close-modal">Action</button>
            </div>   
        </div>
    </div>
</div>
@once
    @push('page_script')
    <script type="text/javascript">
        window.addEventListener('open-confirm-modal', event => {
            $('div > p').text(event.detail.message);
            $('#modal-confirm').modal('show');
            $('#btn').click(function() {
                var param = {};
                param.type = event.detail.type;
                param.id = event.detail.id;
                if(event.detail.data !== undefined)
                    param.data = event.detail.data;
                window.livewire.emit('delete-event', param);
            });
        });
    </script>
    @endpush
@endonce