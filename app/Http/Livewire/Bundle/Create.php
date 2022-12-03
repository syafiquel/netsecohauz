<?php

namespace App\Http\Livewire\Bundle;

use App\Models\Bundle;
use App\Models\Batch;
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
            $unit = $batch->unit_quantity / $this->quantity;
            $count = $unit / $this->quantity;
            foreach (range(1, $count) as $item) {
                $bundle = Bundle::create([
                    'name' => $this->name . '#' . $item,
                    'batch_id' => $batch->id,
                    'quantity' => $count,
                    'description' => $this->description,
                    'remark' => $this->remark,
                ]);
            }
        }
        

        // foreach($this->selecteds as $select)
        // {
        //     $bundle = Bundle::create([

        //         'name' => $this->name,
        //         'quantity' => $this->unit_quantity,
        //         'description' => $this->description,
        //         'remark' => $this->remark,
        //         'unit_id' => intval($select)
        //     ]);
        // }

        $this->emit('flash.message', ['info' => 'Batch Bundle is Created Successfully']);
        $this->emit('userStore');
        $this->emit('refreshDatatable');

    }

    public function updatedUnit()
    {
        $this->selected_batch = $this->batch;
    }

    public function render()
    {
        return view('livewire.bundle.create');
    }
}
