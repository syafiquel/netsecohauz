<?php

namespace App\Http\Livewire\Batch;

use App\Models\Batch;
use App\Models\Palette;
use Livewire\Component;

class Update extends Component
{

    public $name, $palette_quantity, $status, $selected_status, $description, $remark, $palettes, $palette, $selected_palette, $batch;

    public $statuses = [
        'warehouse (pre-production)',
        'on production',
        'warehouse (post-production)',
        'shipped out',
    ];

    public function mount($id)
    {
        $this->batch = Batch::find($id);
        $this->name = $this->batch->name;
        $this->palette_quantity = $this->batch->palette_quantity;
        $this->description = $this->batch->description;
        $this->palette = $this->batch->palette->name;
        $this->selected_palette = $this->batch->palette_id;
        $this->palettes = Palette::pluck('name', 'id')->toArray();
        $this->remark = $this->batch->remark;
        $this->selected_status = $this->status;

    }

    public function render()
    {
        return view('livewire.batch.update');
    }
}
