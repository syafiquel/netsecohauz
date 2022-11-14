<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Bundle;
use App\Models\Carton;
use App\Models\Palette;
use Livewire\Component;

class ConfirmationModal extends Component
{

    protected $listeners = ['delete-event' => 'delete'];

    public function delete($data)
    {
        switch( $data['type'] )
        {
            case 'user':
                $user = User::find($data['id']);
                $user->delete();
                break;
            case 'product':
                $product = Product::find($data['id']);
                $product->delete();
                break;
            case 'unit':
                $unit = Unit::find($data['id']);
                $unit->delete();
                break;
            case 'bundle':
                $bundle = Bundle::find($data['id']);
                $bundle->delete();
                break;
            case 'carton':
                $carton = Carton::find($data['id']);
                $carton->delete();
                break;
            case 'palette':
                $palette = Palette::find($data['id']);
                $palette->delete();
                break;
            default:
                break;

        }
        
        $this->emit('flash.message', ['info' =>  ucfirst($data['type']) . ' Deleted Successfully']);
        $this->emit('userDeleted');
        $this->emit('refreshDatatable');
    }

    public function render()
    {
        return view('livewire.confirmation-modal');
    }
}
