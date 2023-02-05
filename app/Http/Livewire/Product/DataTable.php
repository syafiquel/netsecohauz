<?php

namespace App\Http\Livewire\Product;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;

class DataTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Name")
                ->sortable()
                ->label(fn($row) => $row->name),
            Column::make("Industry")
                ->sortable()
                ->label(fn($row) => $row->industry->name),
            Column::make("Category")
                ->sortable()
                ->label(fn($row) => $row->category->name),
            Column::make("Brand Owner")
                ->sortable()
                ->label(fn($row) => $row->brand_owner->name),
            Column::make("Registered")
                ->sortable()
                ->label(fn($row) => $row->created_at),
            Column::make('')
                ->label(
                    fn($row, Column $column) => "<a href='/product/$row->id/edit' class='btn btn-primary' role='button'><i class='fa-solid fa-pen-to-square'></i></a>"
                )->html(),
            Column::make('')
                ->label(
                    function ($row, Column $column) {
                        $data = [
                            'id' => $row->id,
                            'type' => 'product',
                            'action' => 'Delete',
                            'message' => 'Confirm user '. $row->name . ' deletion?',
                        ];
                        $json_data = json_encode($data);
                        return "<button wire:click='emitEvent($json_data)' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button>";
                    }
                )->html(),
        ];
    }

    public static function getName()
    {
        return 'product.datatable';
    }
}
