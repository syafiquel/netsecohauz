<?php

namespace App\Http\Livewire\Palette\Production;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\PaletteOut;

class DataTable extends DataTableComponent
{
    protected $model = PaletteOut::class;

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
            Column::make('Product / Palette')
                ->label(fn($row) => $row->product_quantity)
                ->searchable(),
            Column::make('Carton / Palette')
                ->label(fn($row) => isset($row->batch->carton_quantity_out) ? ceil($row->product_quantity / ($row->batch->product_quantity / $row->batch->carton_quantity_out)) : 'N/A')
                ->searchable(),
            Column::make('Batch')
                ->label(fn($row) => $row->batch->name)
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
            Column::make('')
                ->label(
                    fn($row, Column $column) => "<button class='btn btn-info' wire:click='emitQrCodeEvent(\"$row->uuid\")'><i class='fa fa-qrcode'></i></a>"
                )->html(),
        ];
    }

    public function builder(): Builder
    {
        
        return PaletteOut::query()->with('batch');
    }

    public function emitEvent($data)
    {
        $this->emit('open-confirm-modal', $data);
    }

    public function emitQrCodeEvent($uuid)
    {
        $this->dispatchBrowserEvent('open-qr-code-modal', $uuid);
    }

    public static function getName()
    {
        return 'palette.production.datatable';
    }
}
