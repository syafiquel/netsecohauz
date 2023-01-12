<x-app-layout>

    <x-slot name="header">
        <div class="section-header">
            <h1>Batch Carton</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="#">Batch Carton</a></div>
            </div>
        </div>
    </x-slot>

    <div class="card-body p-0">

        <x-slot name="card_header">
            <x-button-card-header target="#modal-add-batch-carton-part">Add</x-button-card-header>
        </x-slot>

        @livewire('flash-message')

        <livewire:carton.datatable />

        <x-slot name="modal">
            @livewire('carton.create')
            @livewire('confirmation-modal')
            <x-qrcode></x-qrcode>
        </x-slot>
    </div>
    
    @push('lib_style')
    @endpush

    @push('lib_script')
    @endpush

    @push('page_script')
    <script type="text/javascript" src="{{ asset('js/qrcode.js') }}"></script>
    <script type="text/javascript">
        window.livewire.on('userStore', () => {
            $('#modal-add-batch-carton-part').modal("hide");
        });
        window.livewire.on('userDeleted', () => {
            $('#modal-confirm').modal("hide");
        });
    </script>
    <script type="text/javascript">
    
        window.addEventListener('open-qr-code-modal', event => {
            $('#modal-qr-code-part').modal('show');
        });

        var canvas = document.getElementById('canvas');
        QRCode.toCanvas(document.getElementById('canvas'), 'sampletext', function (error) {
            if (error) console.error(error)
        });

        document.getElementById("btnPrint").onclick = function () {
            var img = new Image;
            img.id = 'tempPrintImage';
            img.onload = printed;
            img.src = canvas.toDataURL();
            document.getElementById("modalBody").appendChild(img);
        }

        function printed() {
            printElement(document.getElementById("tempPrintImage"));
            var img = document.getElementById('tempPrintImage');
            document.getElementById("modalBody").removeChild(img);
            document.getElementById("modalBody").appendChild(canvas);
        }

        function printElement(elem) {
            var domClone = elem.cloneNode(true);
            
            var $printSection = document.getElementById("printSection");
            
            if (!$printSection) {
                var $printSection = document.createElement("div");
                $printSection.id = "printSection";
                document.body.appendChild($printSection);
            }
            
            $printSection.innerHTML = "";
            $printSection.appendChild(domClone);
            document.getElementById("qrcode").removeChild(canvas);
            window.print();
            $('#modal-qr-code-part').modal('hide');
        }

    </script>
    @endpush

</x-app-layout>
