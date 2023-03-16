<?php

namespace App\Http\Livewire\Batch\Summary;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Batch;
use App\Models\PaletteOut;
use App\Models\CartonOut;

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
            Column::make('Palette Completed')
                ->label(function($row) {
                    $compeleted = 0;
                    $palettes = PaletteOut::where('batch_id', $row->id)->get();
                    foreach($palettes as $palette) {
                        if(isset($palette->production_in_at) && isset($palette->production_out_at))
                            $compeleted++;
                    }
                    return $compeleted;
                })
                ->searchable(),
                Column::make('Palette Pending')
                ->label(function($row) {
                    $pending = 0;
                    $palettes = PaletteOut::where('batch_id', $row->id)->get();
                    foreach($palettes as $palette) {
                        if(!isset($palette->production_in_at) || !isset($palette->production_out_at))
                            $pending++;
                    }
                    return $pending;
                })
                ->searchable(),
            Column::make('Carton Completed')
                ->label(function($row) {
                    $compeleted = 0;
                    $cartons = CartonOut::where('batch_id', $row->id)->get();
                    foreach($cartons as $carton) {
                        if(isset($carton->production_in_at) && isset($carton->production_out_at))
                            $compeleted++;
                    }
                    return $compeleted;
                })
                ->searchable(),
            Column::make('Carton Pending')
                ->label(function($row) {
                    $pending = 0;
                    $cartons = CartonOut::where('batch_id', $row->id)->get();
                    foreach($cartons as $carton) {
                        if(!isset($carton->production_in_at) || !isset($carton->production_out_at))
                            $pending++;
                    }
                    return $pending;
                })
                ->searchable(),
            // Column::make('Brand Owner')
            //     ->label(fn($row) => $row->brand_owner->name)
            //     ->searchable(),
            Column::make('Status')
                ->label(fn($row) => $row->status_in)
                ->searchable(),
            Column::make('Production Date')
                ->label(fn($row) => $row->production_at)
                ->searchable(),
            // Column::make('Description')
            //     ->label(fn($row) => $row->description)
            //     ->searchable(),
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
        return 'batch.summary.datatable';
    }
}
