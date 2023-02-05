<x-app-layout>

<x-slot name="header">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
            </div>
        </div>
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{ __('Welcome To ConnectedPackaging Admin Panel') }}

</x-app-layout>
