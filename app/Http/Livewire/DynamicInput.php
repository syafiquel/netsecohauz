<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class DynamicInput extends Component
{

    public $inputs;
    public $selected;
    public $models;
    public $model;
    public $model_str;
    public $label;
    public $name;
    public $model_length;
    public $selecteds;
    protected $listeners = [ 'parent-message' => 'processMessage' ];
    public $is_added = false;

    

    public function addInput()
    {
        $this->selected[] = Str::random(5);
        $this->new_models = $this->model::all()->toArray();
        $this->new_models = collect($this->new_models);
        $this->inputs[] = $this->new_models;
        $this->is_added = true;
    }

    public function removeInput($key)
    {
        $this->inputs->pull($key);
    }

    public function updatedSelected()
    {
        $this->emit('dynamic-select', $this->selected['0']);
        $this->dispatchBrowserEvent('init-dropdown', [ 'data' => $this->selected['0'] ]);
    }


    public function processMessage($msg)
    {
        $this->selecteds = $msg['data'];
    }

    public function mount($model, $label)
    {
        $this->label = $label;
        $this->model_str = $model;
        $this->model = app('App\\Models\\' . ucfirst($model));
        $this->models = $this->model::all()->toArray();
        $this->models = collect($this->models);
        $this->inputs[] =  $this->models;
        $this->selected[] = Str::random(5);
        $this->selecteds = array();
    }


    public function render()
    {
        if( count($this->selecteds) > 0 && $this->is_added)
        {
            $this->is_added = false;
            $this->dispatchBrowserEvent('init-dropdown', [ 'data' => $this->selecteds ]);
        }

        else if( count($this->selecteds) > 0 )
        {
            $this->dispatchBrowserEvent('init-dropdown', [ 'data' => $this->selecteds ]);
        }

        return view('livewire.dynamic-input');
    }
}
