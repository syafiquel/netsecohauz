<?php

namespace App\Http\Livewire\Batch;

use App\Models\Batch;
use App\Models\Palette;
use App\Models\BrandOwner;
use Livewire\Component;

class Create extends Component
{

    public $name, $palette_quantity, $description, $remark, $palettes, $palette, $selected_palette, $brand_owner, $brand_owners, $selected_brand_owner;
    public $selected_status, $status, $selecteds;
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
        $this->palettes = Palette::all();
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

        foreach($this->selecteds as $select)
        {
            $user = Batch::create([

                'name' => $this->name,
                'palette_quantity' => $this->palette_quantity,
                'status' => $this->status,
                'description' => $this->description,
                'remark' => $this->remark,
                'palette_id' => intval($select),
                'brand_owner_id' => BrandOwner::where('name', $this->brand_owner)->first()->id,
            ]);
        }
        

        $this->emit('flash.message', ['info' => 'Batch is Created Successfully']);
        $this->emit('userStore');
        $this->emit('refreshDatatable');

    }

    public function render()
    {
        return view('livewire.batch.create');
    }
}
