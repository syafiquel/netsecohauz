
<div class="modal fade" id="modal-qr-code-part" tabindex="-1" role="dialog" aria-labelledby="qrCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">             
                <h5 class="modal-title" id="qrCodeModalLabel">Batch QR Code</h5>         
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">               
                    <span aria-hidden="true">×</span>             
                </button>           
            </div>
            <div id="modalBody" class="modal-body">
                <div id="qrcode" class="text-center">
                    <canvas id="canvas"></canvas>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke">           
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Donwload</button>
                <button id="btnPrint" type="button" class="btn btn-primary">Print</button>
            </div>   
        </div>
    </div>
</div>
