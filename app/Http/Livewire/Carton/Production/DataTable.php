<?php

namespace App\Http\Livewire\Carton\Production;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Bundle;
use App\Models\CartonOut;

class DataTable extends DataTableComponent
{
    protected $model = CartonOut::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Name')
                ->label(fn($row) => $row->name)
                ->searchable(),
            // Column::make('Carton /  Batch')
            //     ->label(fn($row) => $row->quantity)
            //     ->searchable(),
            // Bundle::where('batch_id', 1)->exists() ? 
            // Column::make('Bundle /  Carton')
            //     ->label(fn($row) => ($row->batch->unit_quantity / $row->quantity) / ($row->batch->unit_quantity / Bundle::where('batch_id', 1)->first()->quantity))
            //     ->searchable() : ''
            // ,
            Column::make('Product / Carton')
                ->label(fn($row) => isset($row->batch->carton_quantity_out) ? $row->product_quantity : 'N/A')
                ->searchable(),
            Column::make('Batch')
                ->label(fn($row) => $row->batch->name)
                ->searchable(),
            Column::make('Description')
                ->label(fn($row) => isset($row->description) ? $row->description : 'N/A')
                ->searchable(),
                Column::make('Status')
                ->label(fn($row) => isset($row->production_in_at) && isset($row->production_out_at) ? 'Completed' : 'Pending')
                ->searchable(),
            Column::make('Production In Date')
                ->label(fn($row) => isset($row->production_in_at) ? $row->production_in_at : 'N/A')
                ->searchable(),
            Column::make('Production Out Date')
                ->label(fn($row) => isset($row->production_out_at) ? $row->production_out_at : 'N/A')
                ->searchable(),
            
            // Column::make('')
            //     ->label(
            //         fn($row, Column $column) => "<a href='/carton/$row->id/edit' class='btn btn-primary' role='button'><i class='fa-solid fa-pen-to-square'></i></a>"
            //     )->html(),
            // Column::make('')
            //     ->label(
            //         function ($row, Column $column) {
            //             $data = [
            //                 'id' => $row->id,
            //                 'type' => 'carton',
            //                 'action' => 'Delete',
            //                 'message' => 'Confirm carton '. $row->name . ' deletion?',
            //             ];
            //             $json_data = json_encode($data);
            //             return "<button wire:click='emitEvent($json_data)' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button>";
            //         }
            //     )->html(),
            Column::make('')
                ->label(
                    fn($row, Column $column) => "<button class='btn btn-info' wire:click='emitQrCodeEvent(\"$row->uuid\")'><i class='fa fa-qrcode'></i></a>"
                )->html(),
        ];
    }

    public function builder(): Builder
    {
        return CartonOut::query()->with('batch');
    }


    public function emitQrCodeEvent($uuid)
    {
        $this->dispatchBrowserEvent('open-qr-code-modal', $uuid);
    }

    public static function getName()
    {
        return 'carton.production.datatable';
    }
}
