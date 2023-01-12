<?php

namespace App\Http\Livewire\Batch;

use Livewire\Component;
use App\Models\Palette;

class RackingDataList extends Component
{

    public $query;
    public $results;
    public $palettes;
    public $title;
    public $key;
    public $placeholder;

    public function mount()
    {
        $this->title = 'Add Racking Slot';
        $this->key = 'name';
        $this->placeholder = 'Search or select a palette name';                                 
        $this->palettes = Palette::select('*')->whereNotIn('id', function($query) {
            $query->select('palette_id')->from('rackings')->where('palette_id', '!=', 'NULL');
        })->get()->toArray();
        
    }

    public function updatedQuery()
    {
        $this->results = $this->getSearchResults($this->query);
        dd($this->results);
    }

    protected function getSearchResults($query)
    {
        return [
            'Result 1',
            'Result 2',
            'Result 3',
        ];
    }

    public function render()
    {
        return view('livewire.batch.racking-data-list');
    }
}
