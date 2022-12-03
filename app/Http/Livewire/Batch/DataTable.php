<?php

namespace App\Http\Livewire\Batch;

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
            Column::make('Units Quantity')
                ->label(fn($row) => $row->unit_quantity)
                ->searchable(),
            Column::make('Brand Owner')
                ->label(fn($row) => $row->brand_owner->name)
                ->searchable(),
            Column::make('Status')
                ->label(fn($row) => $row->status)
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
            Column::make('Registered date')
                ->label(fn($row) => $row->created_at)
                ->searchable(),
            Column::make('')
                ->label(
                    fn($row, Column $column) => "<a href='/batch/$row->id/edit' class='btn btn-primary' role='button'><i class='fa-solid fa-pen-to-square'></i></a>"
                )->html(),
            Column::make('')
                ->label(
                    fn($row, Column $column) => "<button class='btn btn-info' wire:click='emitEvent()'><i class='fa fa-qrcode'></i></a>"
                )->html(),
           
        ];
    }

    public function builder(): Builder
    {
        
        return Batch::query()->with('brand_owner');
    }

    public function emitEvent()
    {
        $this->dispatchBrowserEvent('open-qr-code-modal');
    }

    public static function getName()
    {
        return 'batch.datatable';
    }
}
