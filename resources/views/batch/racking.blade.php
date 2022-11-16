<x-app-layout>

    <x-slot name="header">
        <div class="section-header">
            <h1>Racking</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Racking</a></div>
            </div>
        </div>
    </x-slot>


    <div class="card-body p-0">
        <x-slot name="card_header"></x-slot>

        @livewire('flash-message')

        <div class="row">
            <div class="col-md-8">
                @if(isset($palette_id))
                    @livewire('batch.racking', [ 'palette_id' => $palette_id ])
                @else
                    @livewire('batch.racking')
                @endif
            </div>
            <!-- <div class="col-md-4">
                <div class="h-100" style="margin-top: 50px;"><span>test</span></div>
                
            </div> -->
        </div>
    </div>


    @push('lib_style')
    <style>
    .rack tbody tr td:not(:first-child) {
        border: 0.2em solid blue;
        width: 5em;
        height: 5em;
    }

    .rack tbody tr td:first-child {
        font-weight: bold;
    }


    .rack {
        border-spacing: 3em;
        border-collapse: separate;
    }

    .tab-content {
        overflow-x:auto;
    }
    </style>
    @endpush

    @push('lib_script')
    @endpush

    @push('page_script')
    <script type="text/javascript">
        window.addEventListener('updated-racking', event => {
            window.livewire.reload();
        });
    </script>
    @endpush

</x-app-layout>
