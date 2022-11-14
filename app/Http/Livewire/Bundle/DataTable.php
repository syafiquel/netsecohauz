<?php

namespace App\Http\Livewire\Bundle;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Bundle;

class DataTable extends DataTableComponent
{
    protected $model = Bundle::class;

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
            Column::make('Quantity')
                ->label(fn($row) => $row->quantity)
                ->searchable(),
            Column::make('Batch Unit')
                ->label(fn($row) => $row->unit->name)
                ->searchable(),
            Column::make('Description')
                ->label(fn($row) => $row->description)
                ->searchable(),
            Column::make('Registered date')
                ->label(fn($row) => $row->created_at)
                ->searchable(),
            Column::make('')
                ->label(
                    fn($row, Column $column) => "<a href='/bundle/$row->id/edit' class='btn btn-primary' role='button'><i class='fa-solid fa-pen-to-square'></i></a>"
                )->html(),
            Column::make('')
                ->label(
                    function ($row, Column $column) {
                        $data = [
                            'id' => $row->id,
                            'type' => 'bundle',
                            'action' => 'Delete',
                            'message' => 'Confirm bundle '. $row->name . ' deletion?',
                        ];
                        $json_data = json_encode($data);
                        return "<button wire:click='emitEvent($json_data)' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button>";
                    }
                )->html(),
        ];
    }

    public function builder(): Builder
    {
        
        return Bundle::query()->with('unit');
    }

    public function emitEvent($data)
    {
        $this->dispatchBrowserEvent('open-confirm-modal', $data);
    }

    public static function getName()
    {
        return 'bundle.datatable';
    }
}
