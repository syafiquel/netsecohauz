<?php

namespace App\Http\Livewire\Carton;

use App\Models\Carton;
use App\Models\Batch;
use Livewire\Component;

class Update extends Component
{

    public $name, $quantity, $description, $remark, $batches, $batch, $selected_batch, $carton;

    public function mount($id)
    {
        $this->carton = Carton::find($id);
        $this->name = $this->carton->name;
        $this->quantity = $this->carton->quantity;
        $this->description = $this->carton->description;
        $this->remark = $this->carton->remark;
        $this->batch = $this->carton->batch->name;
        $this->selected_batch = $this->batch;
        $this->batches = Batch::pluck('name')->toArray();

    }

    public function save()
    {
        $this->carton->name = $this->name;
        $this->carton->quantity = $this->quantity;
        $this->carton->description = $this->description;
        $this->carton->remark = $this->remark;
        $this->carton->batch_id = Batch::where('name', $this->batch)->first()->id;
        $this->carton->push();

        $this->emit('flash.message', ['info' => 'Batch carton is Updated Successfully']);
    }

    public function updatedBatch()
    {
        $this->selected_batch = $this->batch;
    }


    public function render()
    {
        return view('livewire.carton.update');
    }
}
