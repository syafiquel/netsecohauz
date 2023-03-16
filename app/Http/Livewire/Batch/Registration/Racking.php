<?php

namespace App\Http\Livewire\Batch\Registration;

use App\Models\Racking as Model;
use App\Models\Batch;
use Livewire\Component;
use Illuminate\Support\Carbon;

class Racking extends Component
{

    public $sections, $columns, $rows, $palette_id;

    public function mount( $palette_id=null )
    {
        $this->palette_id = $palette_id;
        $this->sections = Model::groupBy('section')->pluck('section');
        $this->columns = Model::groupBy('column')->pluck('column');
        $this->rows = Model::groupBy('row')->pluck('row');
        
    }

    public function cellClicked($cell)
    {
       
        $cells = explode('.', $cell);
        $racking = Model::where([
            'section' => $cells[0],
            'row' => $cells[1],
            'column' => $cells[2]])->with('palette.batch')->first();        
        // if($this->current_click < 5)
        // {
            // if(!Model::where('palette_id', $this->palette_id)->exists())
            // {
            //     $racking->palette_id = intval($this->palette_id);
            //     $racking->save();
            //     $palette = Palette::find($this->palette_id);
            //     $message = 'Racking cell ' . $cell .  ' has been assigned to palette "' . $palette->name . '"';
            //     $cell_str = implode('', $cells);
            //     if(isset($racking))
            //     {
            //         $this->emit('flash.message', ['info' => $message ]);
            //         $this->dispatchBrowserEvent('updated-racking');
            //     }
            // }

            if(is_null($racking->palette))
            {
                $this->emit('racking-palette-popup', $cell);
                
            }

            else
            {
                $data = $racking->toArray();
                $data['cell']['section'] = $cells[0];
                $data['cell']['row'] = $cells[1];
                $data['cell']['column'] = $cells[2];
                $this->dispatchBrowserEvent('racking-detail', $data);
            }

            // else
            // {
            //     $message = 'Multiple action not allowed';
            //     $this->emit('flash.message', ['info' => $message, 'type' => 'warning' ]);
            //     $this->dispatchBrowserEvent('updated-racking');
            // }
        //}

        // else
        // {
        //     if(Model::where('palette_id', $this->palette_id)->exists())
        //     {
        //         if(isset($racking->palette->batch_id))
        //         {
        //             $batch_id = $racking->palette->batch_id;
        //             $batch = Batch::find($batch_id)->with('racking.palette')->first();
        //             $this->dispatchBrowserEvent('racking-detail', $batch->toArray());
        //         }
                
        //     }

        //     else
        //     {
        //         $message = 'Racking detail info is not available';
        //         $this->emit('flash.message', ['info' => $message, 'type' => 'warning' ]);
        //     }
        // }

    }

    public function cellDoubleClicked($cell)
    {
        $cells = explode('.', $cell);
        $racking = Model::where([
            'section' => $cells[0],
            'row' => $cells[1],
            'column' => $cells[2]])->exists();
        if($racking)
        {
            $racking = Model::where([
                'section' => $cells[0],
                'row' => $cells[1],
                'column' => $cells[2]])->first();

            $data = $racking;
            $this->emit('racking.detail', ['data' => $data ]);
        }

        else
        {
            $message = 'Racking detail info is not available';
            $this->emit('flash.message', ['info' => $message, 'type' => 'warning' ]);
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
