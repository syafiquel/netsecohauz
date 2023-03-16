<?php

namespace App\Http\Livewire\Batch\Production;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Batch;

class DataTable extends DataTableComponent
{
    protected $model = Batch::class;

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
            Column::make('No')
                ->label(fn($row) => $row->no)
                ->searchable(),
            Column::make('Product Quantity')
                ->label(fn($row) => $row->product_quantity)
                ->searchable(),
            Column::make('Palette Quantity')
                ->label(fn($row) => $row->palette_quantity_out)
                ->searchable(),
            Column::make('Carton Quantity')
                ->label(fn($row) => $row->carton_quantity_out)
                ->searchable(),
            // Column::make('Brand Owner')
            //     ->label(fn($row) => $row->brand_owner->name)
            //     ->searchable(),
            Column::make('Status')
                ->label(fn($row) => $row->status)
                ->searchable(),
            Column::make('Production Date')
                ->label(fn($row) => $row->production_start_at)
                ->searchable(),
            Column::make('Manufactured Date')
                ->label(fn($row) => $row->manufactured_at)
                ->searchable(),
            Column::make('Expired Date')
                ->label(fn($row) => $row->expired_at)
                ->searchable(),
            Column::make('Description')
                ->label(fn($row) => $row->description)
                ->searchable(),
            // Column::make('')
            //     ->label(
            //         fn($row, Column $column) => "<a href='/batch/registration/$row->id/edit' class='btn btn-primary' role='button'><i class='fa-solid fa-pen-to-square'></i></a>"
            //     )->html(),
            // Column::make('')
            //     ->label(
            //         fn($row, Column $column) => "<button class='btn btn-info' wire:click='emitEvent(\"$row->uuid\")'><i class='fa fa-qrcode'></i></a>"
            //     )->html(),
           
        ];
    }

    public function builder(): Builder
    {
        
        return Batch::query()->with('brand_owner');
    }

    public static function getName()
    {
        return 'batch.production.datatable';
    }
}
