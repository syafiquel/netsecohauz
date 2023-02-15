<?php

namespace App\Http\Livewire\Production;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\BatchOperation;

class BatchDataTable extends DataTableComponent
{
    protected $model = BatchOperation::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Name')
                ->label(fn($row) => $row->batch->name)
                ->searchable(),
            Column::make('No')
                ->label(fn($row) => $row->batch->no)
                ->searchable(),
            Column::make('Units Quantity')
                ->label(fn($row) => $row->batch->unit_quantity)
                ->searchable(),
            Column::make('Brand Owner')
                ->label(fn($row) => $row->batch->brand_owner->name)
                ->searchable(),
            Column::make('Status')
                ->label(fn($row) => $row->batch->status)
                ->searchable(),
            Column::make('Manufactured Date')
                ->label(fn($row) => $row->batch->manufactured_at)
                ->searchable(),
            Column::make('Expired Date')
                ->label(fn($row) => $row->batch->expired_at)
                ->searchable(),
            Column::make('Production In Date')
                ->label(fn($row) => $row->created_at)
                ->searchable(),
            Column::make('Production Out Date')
                ->label(fn($row) => $row->updated_at)
                ->searchable(),
            Column::make('')
                ->label(
                    fn($row, Column $column) => "<a href='/batch/$row->batch->id/edit' class='btn btn-primary' role='button'><i class='fa-solid fa-eye'></i></a>"
                )->html(),
            Column::make('')
                ->label(
                    fn($row, Column $column) => "<button class='btn btn-info' wire:click='emitEvent(\"$row->batch->uuid\")'><i class='fa fa-qrcode'></i></a>"
                )->html(),
           
        ];
    }

    public function builder(): Builder
    {
        return BatchOperation::query()->with('batch');
    }

    public function emitEvent($uuid)
    {
        $this->dispatchBrowserEvent('open-qr-code-modal', $uuid);
    }

    public static function getName()
    {
        return 'production.batchdatatable';
    }
}
