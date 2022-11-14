<?php

namespace App\Http\Livewire\Bundle;

use App\Models\Bundle;
use App\Models\Unit;
use Livewire\Component;

class Create extends Component
{

    public $name, $quantity, $description, $remark, $units, $unit, $selected_unit;
    public $selecteds;
    protected $listeners = [ 'dynamic-select' => 'dynamicHandler' ];

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'remark' => 'required',
    ];

    public function dynamicHandler($data)
    {
        $key = 'opt' . explode('.', $data)['1'];
        $value = explode('.', $data)['3'];
        $this->selecteds[$key] = $value;
        $this->emit('parent-message', [ 'data' => $this->selecteds ] );   
    }

    public function mount()
    {
        $this->units = Unit::all();
        $this->selecteds = array();
    }

    public function store()
    {
        $this->validate();

        foreach($this->selecteds as $select)
        {
            $user = Bundle::create([

                'name' => $this->name,
                'quantity' => $this->quantity,
                'description' => $this->description,
                'remark' => $this->remark,
                'unit_id' => intval($select)
            ]);
        }

        $this->emit('flash.message', ['info' => 'Batch Bundle is Created Successfully']);
        $this->emit('userStore');
        $this->emit('refreshDatatable');

    }

    public function updatedUnit()
    {
        $this->selected_unit = $this->unit;
    }

    public function render()
    {
        return view('livewire.bundle.create');
    }
}
