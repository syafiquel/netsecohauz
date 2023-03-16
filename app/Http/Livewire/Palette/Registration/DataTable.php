<?php

namespace App\Http\Livewire\Palette\Registration;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Palette;
use App\Models\Racking;

class DataTable extends DataTableComponent
{
    protected $model = Palette::class;

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
            Column::make('Unit / Palette')
                ->label(fn($row) => $row->unit_quantity)
                ->searchable(),
            Column::make('Carton / Palette')
                ->label(fn($row) => isset($row->batch->carton_quantity) ? ceil($row->unit_quantity / ($row->batch->unit_quantity / $row->batch->carton_quantity)) : 'N/A')
                ->searchable(),
            Column::make('Bundle / Palette')
                ->label(fn($row) => isset($row->batch->bundle_quantity) ? ceil($row->unit_quantity / ($row->batch->unit_quantity / $row->batch->bundle_quantity)) : 'N/A')
                ->searchable(),
            Column::make('Batch')
                ->label(fn($row) => $row->batch->name)
                ->searchable(),
            Column::make('Description')
                ->label(fn($row) => $row->description)
                ->searchable(),
            Column::make('Registered date')
                ->label(fn($row) => $row->created_at)
                ->searchable(),
            Column::make('')
                ->label(
                    fn($row, Column $column) => "<a href='/palette/$row->id/edit' class='btn btn-primary' role='button'><i class='fa-solid fa-pen-to-square'></i></a>"
                )->html(),
            Column::make('')
                ->label(
                    function ($row, Column $column) {
                        $data = [
                            'id' => $row->id,
                            'type' => 'palette',
                            'action' => 'Delete',
                            'message' => 'Confirm palette '. $row->name . ' deletion?',
                        ];
                        $json_data = json_encode($data);
                        return "<button wire:click='emitEvent($json_data)' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button>";
                    }
                )->html(),
            // Column::make('')
            //     ->label(
            //         fn($row, Column $column) => "<a href='#' class='btn btn-info' role='button'><i class='fa-solid fa-table-cells'></i></a>"
            //     )->html(),
            Column::make('')
                ->label(
                    fn($row, Column $column) => isset(Racking::where('palette_id', $row->id)->first()->palette_id) ? "<a href='#' class='btn btn-danger' role='button'><i class='fa-solid fa-table-cells'></i></a>" : "<a href='#' class='btn btn-info' role='button'><i class='fa-solid fa-table-cells'></i></a>"
                )->html(),
            Column::make('')
                ->label(
                    fn($row, Column $column) => "<button class='btn btn-info' wire:click='emitQrCodeEvent()'><i class='fa fa-qrcode'></i></a>"
                )->html(),
        ];
    }

    public function builder(): Builder
    {
        
        return Palette::query()->with('batch');
    }

    public function emitEvent($data)
    {
        $this->emit('open-confirm-modal', $data);
    }

    public function emitQrCodeEvent()
    {
        $this->dispatchBrowserEvent('open-qr-code-modal');
    }

    public static function getName()
    {
        return 'palette.registration.datatable';
    }
}
