<x-app-layout>

    <x-slot name="header">
        <div class="section-header">
            <h1>Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="#">Product</a></div>
            </div>
        </div>
    </x-slot>

    <div class="card-body p-0">

        <x-slot name="card_header">
            <x-button-card-header data-target="#modal-add-product-part">Add</x-button-card-header>
        </x-slot>

        @livewire('flash-message')

        <livewire:product.datatable />

        <x-slot name="modal">
            @livewire('product.create')
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
            $('#modal-add-product-part').modal("hide");
        });
        window.livewire.on('userDeleted', () => {
            $('#modal-confirm').modal("hide");
        });
    </script>
    @endpush

</x-app-layout>
