<x-app-layout>

    <x-slot name="header">
        <div class="section-header">
            <h1>Batch Summary</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="#">Batch Summary</a></div>
            </div>
        </div>
    </x-slot>

    <div class="card-body p-0">

        <livewire:batch.summary.datatable />

    </div>
    
</x-app-layout>
