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
        <x-slot name="card_header">
            <x-button-card-header display="invisible"  target="#modal-add-racking-slot-part">Add</x-button-card-header>
        </x-slot>

        @livewire('flash-message')

        <div class="row">
            <div class="col-md-8">
                @if(isset($palette_id))
                    @livewire('batch.racking', [ 'palette_id' => $palette_id ])
                @else
                    @livewire('batch.racking')
                @endif
            </div>
            <div class="col-md-4">
                @livewire('batch.racking-info')
            </div>
        </div>
        <x-slot name="modal">
            @livewire('confirmation-modal')
            @livewire('batch.racking-data-list')
        </x-slot>
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

    .racking-table tbody tr td {
        border: 0.1em solid black;
        width: auto;
        height: 1.5em;
    }

    @media screen and (min-width: 768px) {

        #racking-detail {
            margin-top: 50%; 
            margin-left: 20%;
        }
    }

        @media screen and (min-width: 360px) and (max-width: 768px) {

        .racking-detail {
            margin-top: 40%; 
            margin-left: 20%;
        }
    }
    
    </style>
    @endpush

    @push('lib_script')
    @endpush

    @push('page_script')
    <script type="text/javascript">
        window.addEventListener('updated-racking', event => {
            window.livewire.restart();
        });

        window.addEventListener('racking-detail', event => {
            var header, content;
            var section = event.detail.cell.section;
            var row = event.detail.cell.row;
            var column = event.detail.cell.column;
            var cell = section + '.' + row + '.' + column;

            $("#racking-table-body").find("tr:gt(0)").remove();            
            for (var i = 0; i < 8; i++) {
                switch(i)
                {
                    case 0:
                        header = 'Palette Id';
                        content = event.detail.racking.palette.id;
                        break;
                    case 1:
                        header = 'Palette Name';
                        content = event.detail.racking.palette.name;
                        break;
                    case 2:
                        header = 'Racking Slot';
                        content = event.detail.racking.section + '.' + event.detail.racking.row + '.' + event.detail.racking.column;
                        break;
                    case 3:
                        header = 'Batch Id';
                        content = event.detail.id;
                        break;
                    case 4:
                        header = 'Batch Name';
                        content = event.detail.name;
                        break;
                    case 5:
                        header = 'Status';
                        content = event.detail.status;
                        break;
                    case 6:
                        header = 'Date In';
                        content = new Date(event.detail.racking.palette.created_at).toDateString();
                        break;
                    case 7:
                        header = 'Date Out';
                        content = new Date(event.detail.racking.palette.created_at).toDateString();
                    default:
                        break;
                }

                $('#racking-table-body').append(
                    `<tr>
                        <td>${header}</td>
                        <td>${content}</td>
                    </tr>`);

            }

            $('#remove-racking').css('display', 'block');

            var param = {};
            param.type = 'init';
            param.cell = cell;
            window.livewire.emit('racking-delete', param);
           
            
        });

        window.livewire.on('userDeleted', data => {
            $('#modal-confirm').modal("hide");
            $('#racking-detail').css('display', 'none');
            window.livewire.emit('racking-deleted', data);
        });

        window.livewire.on('racking-deleted', data => {
            var id = '#' + data;
            $(id).css('background-color', 'blue');
        });

        window.livewire.on('racking-palette-popup', () => {
            $('#open-modal-btn').click();
        });



    </script>
    @endpush

</x-app-layout>