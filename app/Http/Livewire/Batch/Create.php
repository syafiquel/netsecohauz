<?php

namespace App\Http\Livewire\Batch;

use App\Models\Batch;
use App\Models\BrandOwner;
use App\Models\Unit;
use Livewire\Component;

class Create extends Component
{

    public $name, $unit_quantity, $description, $remark, $brand_owners, $brand_owner, $selected_brand_owner;
    public $selected_status, $status, $selecteds;
    public $total_unit_quantity, $batch_unit_quantity;
    protected $listeners = [ 'dynamic-select' => 'dynamicHandler' ];

    public $statuses = [
        'warehouse (pre-production)',
        'on production',
        'warehouse (post-production)',
        'shipped out',
    ];

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'remark' => 'required',
    ];

    public function mount()
    {
        $this->brand_owners = BrandOwner::all();
        $this->selecteds = array();
    }

    public function dynamicHandler($data)
    {
        $key = 'opt' . explode('.', $data)['1'];
        $value = explode('.', $data)['3'];
        $this->selecteds[$key] = $value;
        $this->emit('parent-message', [ 'data' => $this->selecteds ] );   
    }

    public function store()
    {
        $this->validate();
        $counter = 0;


        while(($this->total_unit_quantity - $this->batch_unit_quantity > 0) || ($this->total_unit_quantity > 0))
        {
            $this->total_unit_quantity = $this->total_unit_quantity - $this->batch_unit_quantity;

            if($this->total_unit_quantity != $this->batch_unit_quantity)
            {
                $counter++;
                $this->name_join = $this->name . '#' . $counter;
            }

            $this->unit_quantity = $this->batch_unit_quantity;

            if($this->total_unit_quantity < 0)
                $this->unit_quantity = $this->total_unit_quantity + $this->unit_quantity;

            $batch = Batch::create([
                'name' => $this->name_join,
                'group_name' => $this->name,
                'unit_quantity' => $this->unit_quantity,
                'status' => $this->status,
                'description' => $this->description,
                'remark' => $this->remark,
                'brand_owner_id' => $this->brand_owner,
            ]);

            $unit = Unit::create([
                'name' => $this->name_join,
                'quantity' => $this->unit_quantity,
                'batch_id' => $batch->id,
            ]);

        }

        // foreach($this->selecteds as $select)
        // {
        //     foreach($)
        //     $user = Batch::create([

        //         'name' => $this->name,
        //         'unit_quantity' => $this->unit_quantity,
        //         'status' => $this->status,
        //         'description' => $this->description,
        //         'remark' => $this->remark,
        //         'brand_owner_id' => $brand_owner->id,
        //     ]);
        // }
        

        $this->emit('flash.message', ['info' => 'Batch is Created Successfully']);
        $this->emit('userStore');
        $this->emit('refreshDatatable');

    }

    // public function updatedManufacturedDate()
    // {
        
    //     dd($this->manufactured_date = Carbon::createFromFormat('d-m-Y', $this->manufactured_date)->toDateString());
    // }

    // public function updatedExpiredDate()
    // {
        
    //     dd($this->expired_date = Carbon::createFromFormat('d-m-Y', $this->expired_date)->toDateString());
    // }

    public function render()
    {
        return view('livewire.batch.create');
    }
}
