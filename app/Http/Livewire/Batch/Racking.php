<?php

namespace App\Http\Livewire\Batch;

use App\Models\Racking as Model;
use App\Models\Palette;
use Livewire\Component;

class Racking extends Component
{

    public $sections, $columns, $rows, $palette_id, $cell_clicked;

    public function mount( $palette_id=null )
    {
        $this->cell_clicked = false;
        $this->palette_id = $palette_id;
        $this->sections = Model::groupBy('section')->pluck('section');
        $this->columns = Model::groupBy('column')->pluck('column');
        $this->rows = Model::groupBy('row')->pluck('row');
        
    }

    public function cellClicked($cell)
    {
        if(!$this->cell_clicked)
        {
            $cells = explode('.', $cell);
            $racking = Model::where([
                'section' => $cells[0],
                'row' => $cells[1],
                'column' => $cells[2]])->first();
            $racking->palette_id = intval($this->palette_id);
            $racking->save();
            $palette = Palette::find($this->palette_id);
            $message = 'Racking cell ' . $cell .  ' has been assigned to palette "' . $palette->name . '"';
            $cell_str = implode('', $cells);
            if(isset($racking))
            {
                $this->emit('flash.message', ['info' => $message ]);
                $this->dispatchBrowserEvent('updated-racking');
            }
            $this->cell_clicked = true;
        }

        else
        {
            $message = 'Multiple action not allowed';
            $this->emit('flash.message', ['info' => $message ]);
        }

    }

    public function discardCell($cell)
    {
        $cells = explode('.', $cell);
        $racking = Model::where([
            'section' => $cells[0],
            'row' => $cells[1],
            'column' => $cells[2]])->first();
        if($racking->palette_id)
        {
            $racking->palette_id = null;
            $racking->save();
            $message = 'Racking cell ' . $cell .  ' has been successfully removed';
            $cell_str = implode('', $cells);
            $this->emit('flash.message', ['info' => $message ]);
            $this->dispatchBrowserEvent('updated-racking');
        }

        else
        {
            $message = 'Racking cell slot is already empty';
            $this->emit('flash.message', ['info' => $message ]);
        }
    }

    public function render()
    {
        return view('livewire.batch.racking');
    }
}
