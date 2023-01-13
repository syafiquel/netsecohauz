<?php

namespace App\Http\Livewire\Staff;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DataTable extends DataTableComponent
{
    protected $model = User::class;

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
            Column::make('E-Mail')
                ->label(fn($row) => $row->email)
                ->searchable(),
                Column::make('Phone')
                ->label(fn($row) => $row->staff->phone) 
                ->searchable(),
            Column::make('Department')
                ->label(fn($row) => $row->staff->department)
                ->searchable(),
            Column::make('Status')
                ->label(fn($row) => $row->status)
                ->searchable(),
            Column::make('Join Date')
                ->label(fn($row) => $row->created_at)
                ->searchable(),
            Column::make('')
                ->label(
                    fn($row, Column $column) => "<a href='/staff/$row->id/edit' class='btn btn-primary' role='button'><i class='fa-solid fa-pen-to-square'></i></a>"
                )->html(),
            Column::make('')
                ->label(
                    function ($row, Column $column) {
                        $data = [
                            'id' => $row->id,
                            'type' => 'user',
                            'action' => 'Delete',
                            'message' => 'Confirm user '. $row->name . ' deletion?',
                        ];
                        $json_data = json_encode($data);
                        return "<button wire:click='emitEvent($json_data)' class='btn btn-danger'><i class='fa fa-trash'></i></button>";
                    }
                )->html(),
        ];
    }

    public function builder(): Builder
    {
        
        return User::query()->role('staff')->with(['staff' => function( $query ) {
            return $query->select('user_id', 'phone', 'department');
        }]);
    }

    public function emitEvent($data)
    {
        $this->emit('open-confirm-modal', $data);
    }

    public static function getName()
    {
        return 'staff.datatable';
    }
}
