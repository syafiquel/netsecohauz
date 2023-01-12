<div>
    <div wire:ignore id="racking-detail" class="h-100">
        <table class="racking-table">
            <tbody id="racking-table-body">
            </tbody>
        </table>
        <button x-init="" x-on:click="window.livewire.emit('racking-delete', { 'type': 'commit', 'cell': $wire.get('cell') });"
            type="button" id="remove-racking" class="btn btn-danger mt-2" style="display:none;">Remove</button>
    </div>
</div>