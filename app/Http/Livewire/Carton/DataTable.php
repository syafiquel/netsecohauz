<?php

namespace App\Http\Livewire\Carton;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Bundle;
use App\Models\Carton;

class DataTable extends DataTableComponent
{
    protected $model = Carton::class;

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
            Column::make('Carton /  Batch')
                ->label(fn($row) => $row->quantity)
                ->searchable(),
            Bundle::where('batch_id', 1)->exists() ? 
            Column::make('Bundle /  Carton')
                ->label(fn($row) => ($row->batch->unit_quantity / $row->quantity) / ($row->batch->unit_quantity / Bundle::where('batch_id', 1)->first()->quantity))
                ->searchable() : ''
            ,
            Column::make('Unit / Carton')
                ->label(fn($row) => $row->batch->unit_quantity / $row->quantity)
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
                    fn($row, Column $column) => "<a href='/carton/$row->id/edit' class='btn btn-primary' role='button'><i class='fa-solid fa-pen-to-square'></i></a>"
                )->html(),
            Column::make('')
                ->label(
                    function ($row, Column $column) {
                        $data = [
                            'id' => $row->id,
                            'type' => 'carton',
                            'action' => 'Delete',
                            'message' => 'Confirm carton '. $row->name . ' deletion?',
                        ];
                        $json_data = json_encode($data);
                        return "<button wire:click='emitEvent($json_data)' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button>";
                    }
                )->html(),
        ];
    }

    public function builder(): Builder
    {
        return Carton::query()->with('batch');
    }

    public function emitEvent($data)
    {
        $this->dispatchBrowserEvent('open-confirm-modal', $data);
    }

    public static function getName()
    {
        return 'carton.datatable';
    }
}
