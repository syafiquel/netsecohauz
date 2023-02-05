<?php

namespace App\Http\Livewire\Carton;

use App\Models\Batch;
use App\Models\Carton;
use Livewire\Component;

class Create extends Component
{

    public $name, $quantity, $description, $remark, $batches, $batch, $selected_batch;
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
        $this->batches = Batch::all()->unique('group_name');
        $this->selecteds = array();
    }

    public function store()
    {
        $this->validate();

        $this->batch = Batch::find($this->batch)->first();
        $batches = Batch::where('group_name', $this->batch->group_name)->get();
        foreach($batches as $batch)
        {
            foreach(range(1, $this->quantity) as $item)
            {
                $carton = Carton::create([
                    'name' => $this->name . '#' . $item,
                    'batch_id' => $batch->id,
                    'quantity' => $this->quantity,
                    'description' => $this->description,
                    'remark' => $this->remark,
                ]);
            }
        }

        // foreach($this->selecteds as $select)
        // {
        //     $user = Carton::create([

        //         'name' => $this->name,
        //         'quantity' => $this->quantity,
        //         'description' => $this->description,
        //         'remark' => $this->remark,
        //         'bundle_id' => intval($select)
        //     ]);
        // }
        

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
