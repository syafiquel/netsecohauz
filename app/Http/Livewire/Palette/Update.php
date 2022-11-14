<?php

namespace App\Http\Livewire\Palette;

use App\Models\Palette;
use App\Models\Carton;
use Livewire\Component;

class Update extends Component
{

    public $name, $quantity, $description, $remark, $cartons, $carton, $selected_carton, $palette;

    public function mount($id)
    {
        $this->palette = Palette::find($id);
        $this->name = $this->palette->name;
        $this->quantity = $this->palette->quantity;
        $this->description = $this->palette->description;
        $this->remark = $this->palette->remark;
        $this->carton = $this->palette->carton->name;
        $this->selected_carton = $this->carton;
        $this->cartons = Carton::pluck('name')->toArray();

    }

    public function save()
    {
        $this->palette->name = $this->name;
        $this->palette->quantity = $this->quantity;
        $this->palette->description = $this->description;
        $this->palette->remark = $this->remark;
        $this->palette->carton_id = Carton::where('name', $this->carton)->first()->id;
        $this->palette->push();

        $this->emit('flash.message', ['info' => 'Batch palette is Updated Successfully']);
    }

    public function updatedCarton()
    {
        $this->selected_carton = $this->carton;
    }

    public function render()
    {
        return view('livewire.palette.update');
    }
}
