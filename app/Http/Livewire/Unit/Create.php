<?php

namespace App\Http\Livewire\Unit;

use App\Models\Unit;
use Livewire\Component;

class Create extends Component
{

    public $name, $quantity, $description, $remark;
    //public $brand_owners, $brand_owner, $selected_brand_owner;

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'remark' => 'required',
        //'brand_owner' => 'required',
    ];

    public function mount()
    {
        //$this->brand_owners = BrandOwner::all();
    }

    public function store()
    {
        $this->validate();

        $user = Unit::create([

            'name' => $this->name,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'remark' => $this->remark,
            //'brand_owner_id' => $this->brand_owner
        ]);

        $this->emit('flash.message', ['info' => 'Batch Unit is Created Successfully']);
        $this->emit('userStore');
        $this->emit('refreshDatatable');

    }

    // public function updatedBrandOwner()
    // {
    //     $this->selected_brand_owner = $this->brand_owner;
    // }

    public function render()
    {
        return view('livewire.unit.create');
    }
}
