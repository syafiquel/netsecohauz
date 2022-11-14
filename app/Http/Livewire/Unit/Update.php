<?php

namespace App\Http\Livewire\Unit;

use App\Models\Unit;
use Livewire\Component;

class Update extends Component
{

    public $name, $quantity, $description, $remark, $unit;
    //public $brand_owners, $brand_owner, $selected_brand_owner

    public function mount($id)
    {
        $this->unit = Unit::find($id);
        $this->name = $this->unit->name;
        $this->quantity = $this->unit->quantity;
        $this->description = $this->unit->description;
        $this->remark = $this->unit->remark;
        //$this->brand_owner = $this->unit->brand_owner->user->name;
        // $this->selected_brand_owner = $this->brand_owner;
        // $this->brand_owners = BrandOwner::with('user')->get()->pluck('user.name')->toArray();

    }

    public function save()
    {
        $this->unit->name = $this->name;
        $this->unit->quantity = $this->quantity;
        $this->unit->description = $this->description;
        $this->unit->remark = $this->remark;
        // $this->unit->brand_owner_id = BrandOwner::whereHas('user', function( $query) {
        //     return $query->where('name', '=', $this->brand_owners);
        // })->first()->id;
        $this->unit->push();

        $this->emit('flash.message', ['info' => 'Batch Unit is Updated Successfully']);
    }

    // public function updatedBrandOwner()
    // {
    //     $this->selected_brand_owner = $this->brand_owner;
    // }

    public function render()
    {
        return view('livewire.unit.update');
    }
}
