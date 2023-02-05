<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DataTable extends DataTableComponent
{

    public $user_id, $first_name, $last_name, $address_1, $address_2, $postcode, $city, $state, $country, $name, $email, $password, $phone;

    public function mount()
    {
       
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::with('staff')->where('id', $id)->first();
        $this->user_id = $id;
        $this->username = $user->name;
        $this->email = $user->email;
        $this->first_name = $user->staff->first_name;
        $this->last_name = $user->staff->last_name;
        $this->address_1 = $user->staff->address_1;
        $this->address_2 = $user->staff->address_2;
        $this->postcode = $user->staff->postcode;
        $this->city = $user->staff->city;
        $this->state = $user->staff->state;
        $this->country = $user->staff->country;
        $this->phone = $user->staff->phone;
    }


    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id")
                ->label(fn($row) => $row->id)
                ->searchable(),
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
                    fn($row, Column $column) => "<a href='/admin/$row->id/edit' class='btn btn-primary' role='button'><i class='fa-solid fa-pen-to-square'></i></a>"
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

    public function emitEvent($data)
    {
        $this->emit('open-confirm-modal', $data);
    }

    public function builder(): Builder
    {
        
        return User::query()->role('admin')->with(['staff' => function( $query ) {
            return $query->select('user_id', 'phone', 'department');
        }]);
    }

    public static function getName()
    {
        return 'admin.datatable';
    }
}
