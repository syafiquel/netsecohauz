<?php

namespace App\Http\Livewire\Carton;

use App\Models\Carton;
use App\Models\Bundle;
use Livewire\Component;

class Update extends Component
{

    public $name, $quantity, $description, $remark, $bundles, $bundle, $selected_bundle, $carton;

    public function mount($id)
    {
        $this->carton = Carton::find($id);
        $this->name = $this->carton->name;
        $this->quantity = $this->carton->quantity;
        $this->description = $this->carton->description;
        $this->remark = $this->carton->remark;
        $this->bundle = $this->carton->bundle->name;
        $this->selected_bundle = $this->bundle;
        $this->bundles = Bundle::pluck('name')->toArray();

    }

    public function save()
    {
        $this->carton->name = $this->name;
        $this->carton->quantity = $this->quantity;
        $this->carton->description = $this->description;
        $this->carton->remark = $this->remark;
        $this->carton->bundle_id = Bundle::where('name', $this->bundle)->first()->id;
        $this->carton->push();

        $this->emit('flash.message', ['info' => 'Batch carton is Updated Successfully']);
    }

    public function updatedBundle()
    {
        $this->selected_bundle = $this->bundle;
    }


    public function render()
    {
        return view('livewire.carton.update');
    }
}
