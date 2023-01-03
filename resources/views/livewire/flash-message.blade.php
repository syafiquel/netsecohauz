<div>
@php
    if(session()->has('message'))
    {
        $message = session('message')['info'];
        $type = isset(session('message')['type']) ? session('message')['type'] : 'success';
    }
@endphp
@if (session()->has('message'))
    <div class="alert alert-{{ $type }} alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>x</span>
            </button>
            {{ $message }}
        </div>
    </div>
@endif 
</div>
