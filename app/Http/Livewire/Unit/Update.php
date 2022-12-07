<?php

namespace App\Http\Livewire\Unit;

use App\Models\Unit;
use App\Models\Batch;
use Livewire\Component;

class Update extends Component
{

    public $name, $quantity, $description, $remark, $unit;
    public $batches, $batch, $selected_batch;

    public function mount($id)
    {
        $this->unit = Unit::find($id);
        $this->name = $this->unit->name;
        $this->quantity = $this->unit->quantity;
        $this->description = $this->unit->description;
        $this->remark = $this->unit->remark;
        $this->batch = $this->unit->batch->name;
        $this->selected_batch = $this->batch;
        $this->batches = Batch::pluck('name')->toArray();

    }

    public function save()
    {
        $this->unit->name = $this->name;
        $this->unit->quantity = $this->quantity;
        $this->unit->description = $this->description;
        $this->unit->remark = $this->remark;
        $this->unit->batch_id = Batch::where('name', $this->batch)->first()->id;
        $this->unit->push();

        $this->emit('flash.message', ['info' => 'Batch Unit is Updated Successfully']);
    }

    public function updatedBatch()
    {
        $this->selected_batch = $this->batch;
    }

    public function render()
    {
        return view('livewire.unit.update');
    }
}
