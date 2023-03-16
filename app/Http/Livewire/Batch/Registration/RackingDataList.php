<?php

namespace App\Http\Livewire\Batch\Registration;

use Livewire\Component;
use App\Models\PaletteIn;
use App\Models\Racking;

class RackingDataList extends Component
{

    public $query;
    public $results;
    public $palettes;
    public $title;
    public $key;
    public $placeholder;
    public $cell;

    protected $listeners = [ 'racking-palette-adding' => 'rackingPaletteAdded', 'racking-palette-clear' => 'clearInput', 'testev' => 'reRender'];

    public function mount()
    {
        $this->title = 'Add Racking Slot';
        $this->key = 'name';
        $this->cell = '';
        $this->placeholder = 'Search or select a palette name';                                 
        $this->palettes = PaletteIn::select('*')->whereNotIn('id', function($query) {
            $query->select('palette_id')->from('rackings')->where('palette_id', '!=', 'NULL');
        })->get()->toArray();
        
    }

    public function reRender()
    {
        $this->palettes = PaletteIn::select('*')->whereNotIn('id', function($query) {
            $query->select('palette_id')->from('rackings')->where('palette_id', '!=', 'NULL');
        })->get()->toArray();
        $this->render();
    }

    public function rackingPaletteAdded($cell)
    {
        $this->cell = $cell;
    }

    public function setUpdated()
    {
    }

    public function clearInput()
    {
        $this->query = '';
    }

    public function updatedQuery()
    {
        $this->results = $this->getSearchResults($this->query);
    }

    protected function getSearchResults($query)
    {
        return PaletteIn::where('name', 'LIKE', '%' . $query . '%')->select('name')->get()->toArray();
    }

    public function store()
    {
        $cell = explode('.', $this->cell);
        $racking = Racking::where([
            'section' => $cell[0],
            'row' => $cell[1],
            'column' => $cell[2]])->first();
        $palette = PaletteIn::where('name', $this->query)->select('id')->first();
        $racking->palette_id = $palette->id;
        $racking->save();
        $data = array('cell' => $cell[0] . $cell[1] . $cell[2], 'palette' => $this->query);
        $this->emit('racking-palette-added', $data);
    }

    public function render()
    {
        return view('livewire.batch.racking-data-list');
    }
}
