<?php

namespace App\Http\Livewire\Bundle;

use App\Models\Unit;
use App\Models\Bundle;
use Livewire\Component;

class Update extends Component
{

    public $name, $quantity, $description, $remark, $units, $unit, $selected_unit, $bundle;

    public function mount($id)
    {
        $this->bundle = Bundle::find($id);
        $this->name = $this->bundle->name;
        $this->quantity = $this->bundle->quantity;
        $this->description = $this->bundle->description;
        $this->remark = $this->bundle->remark;
        $this->unit = $this->bundle->unit->name;
        $this->selected_unit = $this->unit;
        $this->units = Unit::pluck('name')->toArray();

    }

    public function save()
    {
        $this->bundle->name = $this->name;
        $this->bundle->quantity = $this->quantity;
        $this->bundle->description = $this->description;
        $this->bundle->remark = $this->remark;
        $this->bundle->unit_id = Unit::where('name', $this->unit)->first()->id;
        $this->bundle->push();

        $this->emit('flash.message', ['info' => 'Batch Bundle is Updated Successfully']);
    }


    public function updatedUnit()
    {
        $this->selected_unit = $this->unit;
    }

    public function render()
    {
        return view('livewire.bundle.update');
    }
}
