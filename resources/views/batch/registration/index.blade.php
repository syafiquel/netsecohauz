<x-app-layout>

    <x-slot name="header">
        <div class="section-header">
            <h1>Batch</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Batch</a></div>
            </div>
        </div>
    </x-slot>


    <x-slot name="card_header">
        <div class="card-header-form">

        </div>
    </x-slot>


    <div class="row">
        <div class="col-12 col-md-4 col-lg-4">
            <div class="card text-center">
                <div class="card-block pt-5">
                    <div class="card-title">
                        <h4>Manage Incoming Batch Unit</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{ route('unit.index') }}"><i class="fa fa-brands fa-unity fa-3x"></i></a>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card text-center">
                <div class="card-block pt-5">
                    <div class="card-title">
                        <h4>Manage Incoming Batch Palette</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{ route('palette.production.index') }}"><i class="fa-solid fa-pallet fa-3x"></i></a>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
            <div class="card text-center">
                <div class="card-block pt-5">
                    <div class="card-title">
                        <h4>Manage Incoming Batch Bundle</h4>
                    </div>
                </div>
                <div class="card-body">
                <a href="{{ route('bundle.index') }}"><i class="fa-solid fa-boxes-stacked fa-3x"></i></a>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card text-center">
                <div class="card-block pt-5">
                    <div class="card-title">
                        <h4>Manage Incoming Batch</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{ route('batch.registration.create') }}"><i class="fa-solid fa-boxes-packing fa-3x"></i></a>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
            <div class="card text-center">
                <div class="card-block pt-5">
                    <div class="card-title">
                        <h4>Manage Incoming Batch Carton</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{ route('carton.production.index') }}"><i class="fa-solid fa-box fa-3x"></i></a>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card text-center">
                <div class="card-block pt-5">
                    <div class="card-title">
                        <h4>Manage Incoming Batch Racking</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{ route('racking') }}"><i class='fa-solid fa-table-cells fa-3x'></i></a>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>

    @push('lib_style')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select.bootstrap4.css') }}">
    @endpush

    @push('lib_script')
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/select.bootstrap4.js') }}"></script>
    @endpush

    @push('page_script')
    <script src="{{ asset('js/modules-datatables.js') }}"></script>
    <script src="{{ asset('js/bootstrap-modal.js') }}"></script>
    <script type="text/javascript">
    window.livewire.on('userStore', () => {
        $('#modal-add-admin-part').hide();
    });
    $('#add-admin-btn').attr("wire:click", "store()");
    </script>
    @endpush

</x-app-layout>