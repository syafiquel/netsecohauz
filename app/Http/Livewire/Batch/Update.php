<?php

namespace App\Http\Livewire\Batch;

use App\Models\Batch;
use App\Models\BrandOwner;
use Livewire\Component;
use Illuminate\Support\Carbon;


class Update extends Component
{

    public $name, $unit_quantity, $status, $selected_status, $description, $remark, $brand_owners, $brand_owner, $selected_brand_owner, $batch;
    public $expired_date, $manufactured_date;
    public $calendar_update = false;
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
        $this->unit_quantity = $this->batch->unit_quantity;
        $this->description = $this->batch->description;
        $this->brand_owner = $this->batch->brand_owner->name;
        $this->status = $this->batch->status;
        $this->manufactured_date = is_null($this->batch->manufactured_at) ? $this->batch->manufactured_at : Carbon::parse($this->batch->manufactured_at)->format('d-m-Y');
        $this->expired_date = is_null($this->batch->expired_at) ? $this->batch->expired_at : Carbon::parse($this->batch->expired_at)->format('d-m-Y');
        
        $this->selected_brand_owner = $this->batch->brand_owner_id;
        $this->brand_owners = BrandOwner::pluck('name', 'id')->toArray();
        $this->remark = $this->batch->remark;
        $this->selected_status = $this->status;
        if( is_null($this->manufactured_date) && is_null($this->expired_date) )
            $this->calendar_update = false;
        else
        $this->calendar_update = true;

    }

    public function save()
    {
        $this->batch->name = $this->name;
        $this->batch->unit_quantity = $this->unit_quantity;
        $this->batch->status = $this->selected_status;
        $this->batch->description = $this->description;
        //dd($this->expired_date);
        $this->batch->manufactured_at = Carbon::parse($this->manufactured_date)->format('Y-m-d');
        $this->batch->expired_at = Carbon::parse($this->expired_date)->format('Y-m-d');
        $this->batch->remark = $this->remark;
        $this->batch->brand_owner_id = BrandOwner::where('name', $this->brand_owner)->first()->id;
        $this->batch->push();

        $this->emit('flash.message', ['info' => 'Batch Bundle is Updated Successfully']);
    }


    public function updatedBrandOwner()
    {
        $this->selected_brand_owner = $this->brand_owner;
    }

    public function updatedStatus()
    {
        $this->selected_status = $this->status;
    }

    public function render()
    {
        return view('livewire.batch.update');
    }
}
