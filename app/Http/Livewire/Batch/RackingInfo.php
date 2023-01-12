<?php

namespace App\Http\Livewire\Batch;

use Livewire\Component;
use App\Models\Racking;

class RackingInfo extends Component
{

    public $cell;
    protected $listeners = ['racking-delete' => 'delete'];

    public function mount()
    {
        $this->cell = '';
    }

    public function render()
    {
        return view('livewire.batch.racking-info');
    }

    public function delete($data)
    {
        if($data['type'] == 'init')
            $this->cell = $data['cell'];
        else
        {
            $cell = explode('.', $data['cell']);
            $racking = Racking::where([
                'section' => $cell[0],
                'row' => $cell[1],
                'column' => $cell[2]])->first();
            $param = [
                'id' => $racking->id,
                'type' => 'racking',
                'action' => 'Delete',
                'message' => 'Confirm racking '. $racking->section . '.' . $racking->row . '.' . $racking->column . ' deletion?',
                'data' => $racking->section . $racking->row . $racking->column,
            ];
            $this->dispatchBrowserEvent('open-confirm-modal', $param);
        }
    }
}
