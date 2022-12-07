<?php

namespace App\Http\Livewire\Palette;

use App\Models\Palette;
use App\Models\Batch;
use Livewire\Component;

class Update extends Component
{

    public $name, $quantity, $description, $remark, $batches, $batch, $selected_batch, $palette;

    public function mount($id)
    {
        $this->palette = Palette::find($id);
        $this->name = $this->palette->name;
        $this->quantity = $this->palette->quantity;
        $this->description = $this->palette->description;
        $this->remark = $this->palette->remark;
        $this->batch = $this->palette->batch->name;
        $this->selected_batch = $this->batch;
        $this->batches = Batch::pluck('name')->toArray();

    }

    public function save()
    {
        $this->palette->name = $this->name;
        $this->palette->quantity = $this->quantity;
        $this->palette->description = $this->description;
        $this->palette->remark = $this->remark;
        $this->palette->batch_id = Batch::where('name', $this->batch)->first()->id;
        $this->palette->push();

        $this->emit('flash.message', ['info' => 'Batch palette is Updated Successfully']);
    }

    public function updatedBatch()
    {
        $this->selected_batch = $this->batch;
    }

    public function render()
    {
        return view('livewire.palette.update');
    }
}
