<?php

namespace App\Http\Livewire\Batch\Production;

use Livewire\Component;
use App\Models\Batch;
use App\Models\CartonOut;
use App\Models\PaletteOut;

class Create extends Component
{

    public $batch, $batches;
    public $total_product_quantity, $description;
    public $products_per_carton_quantity, $products_per_palette_quantity;
    public $placeholder = "Select a batch";
    public $model = "batch";

    public function mount()
    {
        $this->batches = Batch::where('status', 'pre-production')->get();
    }

    public function store()
    {
        $palette_counter = 0;
        $carton_counter = 0;
        $palette_product_quantity = $this->total_product_quantity;
        $carton_product_quantity = $this->total_product_quantity;

        $batch = Batch::where('name', $this->batch)->first();
        $batch->product_quantity = $this->total_product_quantity;
        $batch->carton_quantity_out = $this->total_product_quantity / $this->products_per_carton_quantity;
        $batch->palette_quantity_out = $this->total_product_quantity / $this->products_per_palette_quantity;
        $batch->save();

        while(($palette_product_quantity - $this->products_per_palette_quantity > 0) || ($palette_product_quantity > 0))
        {
            $palette_counter++;

            if($palette_product_quantity > $this->products_per_palette_quantity)
                $quantity = $this->products_per_palette_quantity;
            else
                $quantity = $palette_product_quantity;
            $palette_product_quantity = $palette_product_quantity - $this->products_per_palette_quantity;
            PaletteOut::create([
                'name' => $batch->name . '#' . $palette_counter . ' out',
                'batch_id' => $batch->id,
                'product_quantity' => $quantity,
                'description' => $this->description

            ]);

        }

        while(($carton_product_quantity - $this->products_per_carton_quantity > 0) || ($carton_product_quantity > 0))
        {
            $carton_counter++;

            if($carton_product_quantity > $this->products_per_carton_quantity)
                $quantity = $this->products_per_carton_quantity;
            else
                $quantity = $carton_product_quantity;
            $carton_product_quantity = $carton_product_quantity - $this->products_per_carton_quantity;
            CartonOut::create([
                'name' => $batch->name . '#' . $carton_counter . ' out',
                'batch_id' => $batch->id,
                'product_quantity' => $quantity

            ]);

        }
        
        $this->emit('flash.message', ['info' => 'Batch is Created Successfully']);
        $this->emit('userStore');
        $this->emit('refreshDatatable');
    }

    public function render()
    {
        return view('livewire.batch.production.create');
    }
}
