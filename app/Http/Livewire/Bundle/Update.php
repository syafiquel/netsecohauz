<?php

namespace App\Http\Livewire\Bundle;

use App\Models\Batch;
use App\Models\Bundle;
use Livewire\Component;

class Update extends Component
{

    public $name, $unit_quantity, $description, $remark, $batches, $batch, $selected_batch, $bundle;

    public function mount($id)
    {
        $this->bundle = Bundle::find($id);
        $this->name = $this->bundle->name;
        $this->unit_quantity = $this->bundle->unit_quantity;
        $this->description = $this->bundle->description;
        $this->remark = $this->bundle->remark;
        $this->batch = $this->bundle->batch->name;
        $this->selected_batch = $this->batch;
        $this->batches = Batch::pluck('name')->toArray();

    }

    public function save()
    {
        $this->bundle->name = $this->name;
        $this->bundle->unit_quantity = $this->unit_quantity;
        $this->bundle->description = $this->description;
        $this->bundle->remark = $this->remark;
        $this->bundle->batch_id = Batch::where('name', $this->batch)->first()->id;
        $this->bundle->push();

        $this->emit('flash.message', ['info' => 'Batch Bundle is Updated Successfully']);
    }


    public function updatedBatch()
    {
        $this->selected_batch = $this->batch;
    }

    public function render()
    {
        return view('livewire.bundle.update');
    }
}
