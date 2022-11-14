<?php

namespace App\Http\Livewire\Batch;

use App\Models\Batch;
use App\Models\Palette;
use App\Models\BrandOwner;
use Livewire\Component;

class Update extends Component
{

    public $name, $palette_quantity, $description, $remark, $batch;
    public $palettes, $palette, $selected_palette, $status, $selected_status, $brand_owner, $brand_owners, $selected_brand_owner;

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
        $this->status = $this->batch->status;
        $this->selected_status = $this->status;
        $this->brand_owner = $this->batch->brand_owner->name;
        $this->selected_palette = $this->batch->palette_id;
        $this->selected_brand_owner = $this->brand_owner;
        $this->palettes = Palette::pluck('name')->toArray();
        $this->brand_owners = BrandOwner::pluck('name')->toArray();
        $this->remark = $this->batch->remark;
        $this->selected_status = $this->status;

    }

    public function save()
    {
        $this->batch->name = $this->name;
        $this->batch->palette_quantity = $this->palette_quantity;
        $this->batch->description = $this->description;
        $this->batch->remark = $this->remark;
        $this->batch->palette_id = Palette::where('name', $this->palette)->first()->id;
        $this->batch->brand_owner_id = BrandOwner::where('name', $this->brand_owner)->first()->id;
        $this->batch->status = $this->status;
        $this->batch->push();

        $this->emit('flash.message', ['info' => 'Batch palette is Updated Successfully']);
    }

    public function updatedPalette()
    {
        $this->selected_palette = $this->palette;
    }

    public function updatedStatus()
    {
        $this->selected_status = $this->status;
    }

    public function updatedBrandOwner()
    {
        $this->selected_brand_owner = $this->brand_owner;
    }

    public function render()
    {
        return view('livewire.batch.update');
    }
}
