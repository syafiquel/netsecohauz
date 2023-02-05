<x-app-layout>
        <x-slot name="header">
            <div class="section-header">
                <h1>Edit Batch Bundle</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Batch Bundle</a></div>
                </div>
                 </div>
        </x-slot>

        <div class="card-body p-0">

            @livewire('flash-message')

            @livewire('bundle.update', ['id' => $id])

        @push('lib_style')
        @endpush

        @push('lib_script')
        @endpush

        @push('page_script')
        <script type="text/javascript">
            window.livewire.on('userStore', () => {
                $('#modal-add-admin-part').modal("hide");
            });

        </script>
        @endpush

    </x-app-layout>