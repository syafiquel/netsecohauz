<?php

namespace App\Http\Livewire\BrandOwner;

use App\Models\User;
use App\Models\BrandOwner;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DataTable extends DataTableComponent
{

    public $user_id, $address_1, $address_2, $postcode, $city, $state, $country, $name, $email, $password, $phone;

    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Name')
                ->label(fn($row) => $row->brand_owner->name)
                ->searchable(),
            Column::make('E-Mail')
                ->label(fn($row) => $row->email)
                ->searchable(),
            Column::make('Phone')
                ->label(fn($row) => $row->brand_owner->phone) 
                ->searchable(),
            Column::make('Website')
                ->label(fn($row) => $row->brand_owner->website ?? '')
                ->searchable(),
            Column::make('Status')
                ->label(fn($row) => $row->status)
                ->searchable(),
            Column::make('Join Date')
                ->label(fn($row) => $row->created_at)
                ->searchable(),
            Column::make('')
                ->label(
                    fn($row, Column $column) => "<a href='/brand-owner/$row->id/edit' class='btn btn-primary' role='button'><i class='fa-solid fa-pen-to-square'></i></a>"
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
        $this->dispatchBrowserEvent('open-confirm-modal', $data);
    }

    public function builder(): Builder
    {
        
        return User::query()->role('brand owner')->with(['brand_owner' => function( $query ) {
            return $query->select('user_id', 'name', 'phone', 'website');
        }]);
    }

    public static function getName()
    {
        return 'brand-owner.datatable';
    }
}
