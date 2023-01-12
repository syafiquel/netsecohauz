<x-app-layout>

    <x-slot name="header">
        <div class="section-header">
            <h1>Batch Bundle</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="#">Batch Bundle</a></div>
            </div>
        </div>
    </x-slot>

    <div class="card-body p-0">

        <x-slot name="card_header">
            <x-button-card-header target="#modal-add-batch-bundle-part">Add</x-button-card-header>
        </x-slot>

        @livewire('flash-message')

        <livewire:bundle.datatable />

        <x-slot name="modal">
            @livewire('bundle.create')
            @livewire('confirmation-modal')
        </x-slot>
    </div>
    
    @push('lib_style')
    @endpush

    @push('lib_script')
    @endpush

    @push('page_script')
    <script type="text/javascript">
        window.livewire.on('userStore', () => {
            $('#modal-add-batch-bundle-part').modal("hide");
        });
        window.livewire.on('userDeleted', () => {
            $('#modal-confirm').modal("hide");
        });
    </script>
    @endpush

</x-app-layout>
