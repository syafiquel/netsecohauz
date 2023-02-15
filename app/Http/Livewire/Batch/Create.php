<?php

namespace App\Http\Livewire\Batch;

use App\Models\Batch;
use App\Models\BrandOwner;
use App\Models\Unit;
use App\Models\Palette;
use App\Models\Carton;
use App\Models\Bundle;
use App\Exceptions\DuplicateDataHandler;
use Livewire\Component;
use Illuminate\Database\QueryException;
use App\Exceptions\DuplicateDataException;

class Create extends Component
{

    public $name, $unit_quantity, $description, $remark, $brand_owners, $brand_owner, $selected_brand_owner;
    public $selected_status, $status, $selecteds;
    public $total_unit_quantity, $unit_per_palette_quantity, $unit_per_carton_quantity, $unit_per_bundle_quantity = 0;
    protected $listeners = [ 'dynamic-select' => 'dynamicHandler' ];

    public $statuses = [
        'warehouse (pre-production)',
        'on production',
        'warehouse (post-production)',
        'warehouse (post-production loose)',
        'warehouse (post-production defect)',
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
        $palette_counter = 0;
        $carton_counter = 0;
        $bundle_counter = 0;
        $unit_counter = 0;
        $palette_unit_quantity = $this->total_unit_quantity;
        $carton_unit_quantity = $this->total_unit_quantity;
        $bundle_unit_quantity = $this->total_unit_quantity;


        try 
        {
            $batch = Batch::create([
                'name' => $this->name,
                'unit_quantity' => $this->total_unit_quantity,
                'palette_quantity' => ceil($this->total_unit_quantity / $this->unit_per_palette_quantity),
                'carton_quantity' => $this->total_unit_quantity / $this->unit_per_carton_quantity,
                'bundle_quantity' => $this->total_unit_quantity / $this->unit_per_bundle_quantity,
                'status' => $this->status,
                'description' => $this->description,
                'remark' => $this->remark,
                'brand_owner_id' => $this->brand_owner,
            ]);

            $batch->no = sprintf('%06d', strval($batch->id));
            $batch->save();

            while(($palette_unit_quantity - $this->unit_per_palette_quantity > 0) || ($palette_unit_quantity > 0))
            {
                $palette_counter++;

                if($palette_unit_quantity > $this->unit_per_palette_quantity)
                    $quantity = $this->unit_per_palette_quantity;
                else
                    $quantity = $palette_unit_quantity;

                $palette_unit_quantity = $palette_unit_quantity - $this->unit_per_palette_quantity;

                $palette = Palette::create([    
                    'name' => $this->name . '#' . $palette_counter,
                    'unit_quantity' => $quantity,
                    'description' => $this->description,
                    'remark' => $this->remark,
                    'batch_id' => $batch->id,
                ]);

            }

            while(($carton_unit_quantity - $this->unit_per_carton_quantity > 0) || ($carton_unit_quantity > 0))
            {
                $carton_counter++;

                if($carton_unit_quantity > $this->unit_per_carton_quantity)
                    $quantity = $this->unit_per_carton_quantity;
                else
                    $quantity = $carton_unit_quantity;

                $carton_unit_quantity = $carton_unit_quantity - $this->unit_per_carton_quantity;

                $carton = Carton::create([    
                    'name' => $this->name . '#' . $carton_counter,
                    'unit_quantity' => $quantity,
                    'description' => $this->description,
                    'remark' => $this->remark,
                    'batch_id' => $batch->id,
                ]);

            }

            if($this->unit_per_bundle_quantity > 0)
            {
                while(($bundle_unit_quantity - $this->unit_per_bundle_quantity > 0) || ($bundle_unit_quantity > 0))
                {
                    $bundle_counter++;

                    if($bundle_unit_quantity > $this->unit_per_bundle_quantity)
                        $quantity = $this->unit_per_bundle_quantity;
                    else
                        $quantity = $bundle_unit_quantity;

                    $bundle_unit_quantity = $bundle_unit_quantity - $this->unit_per_bundle_quantity;

                    $bundle = Bundle::create([
                        'name' => $this->name . '#' . $bundle_counter,
                        'batch_id' => $batch->id,
                        'unit_quantity' => $quantity,
                        'description' => $this->description,
                        'remark' => $this->remark,
                    ]);

                }
            }

            $unit = Unit::create([
                'name' => $this->name,
                'quantity' => $this->total_unit_quantity,
                'batch_id' => $batch->id,
            ]);

            $this->emit('flash.message', ['info' => 'Batch is Created Successfully']);
            $this->emit('userStore');
            $this->emit('refreshDatatable');
        }

        catch(QueryException $e)
        {
            dd($e);
            $this->emit('userStore');
            $this->emit('flash.message', ['info' => 'Batch name ' . $this->name . ' is already created', 'type' => 'danger']);
        }
        

        // while(($this->total_unit_quantity - $this->batch_unit_quantity > 0) || ($this->total_unit_quantity > 0))
        // {
        //     $this->total_unit_quantity = $this->total_unit_quantity - $this->batch_unit_quantity;

        //     if($this->total_unit_quantity != $this->batch_unit_quantity)
        //     {
        //         $counter++;
        //         $this->name_join = $this->name . '#' . $counter;
        //     }

        //     $this->unit_quantity = $this->batch_unit_quantity;

        //     if($this->total_unit_quantity < 0)
        //         $this->unit_quantity = $this->total_unit_quantity + $this->unit_quantity;

        //     $batch = Batch::create([
        //         'name' => $this->name_join,
        //         'group_name' => $this->name,
        //         'unit_quantity' => $this->unit_quantity,
        //         'status' => $this->status,
        //         'description' => $this->description,
        //         'remark' => $this->remark,
        //         'brand_owner_id' => $this->brand_owner,
        //     ]);

        //     $unit = Unit::create([
        //         'name' => $this->name_join,
        //         'quantity' => $this->unit_quantity,
        //         'batch_id' => $batch->id,
        //     ]);

        // }

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
