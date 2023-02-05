@props(['display' => 'visible', 'target' => '#modal-add-id'])
<button  {{ $attributes->merge(['class' => 'btn btn-primary ' . $display, 'data-target' => $target]) }} id="open-modal-btn" data-toggle="modal">
        {{ $slot }}
</button>