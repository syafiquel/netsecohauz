<?php

namespace App\Http\Livewire\Carton;

use App\Models\Bundle;
use App\Models\Carton;
use Livewire\Component;

class Create extends Component
{

    public $name, $quantity, $description, $remark, $bundles, $bundle, $selected_bundle;
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
        $this->bundles = Bundle::all();
        $this->selecteds = array();
    }

    public function store()
    {
        $this->validate();
        foreach($this->selecteds as $select)
        {
            $user = Carton::create([

                'name' => $this->name,
                'quantity' => $this->quantity,
                'description' => $this->description,
                'remark' => $this->remark,
                'bundle_id' => intval($select)
            ]);
        }
        

        $this->emit('flash.message', ['info' => 'Batch Carton is Created Successfully']);
        $this->emit('userStore');
        $this->emit('refreshDatatable');

    }

    public function updatedBundle()
    {
        $this->selected_bundle = $this->bundle;
    }


    public function render()
    {
        return view('livewire.carton.create');
    }
}
