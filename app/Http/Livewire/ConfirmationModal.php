<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Bundle;
use App\Models\Carton;
use App\Models\Palette;
use App\Models\Racking;
use Livewire\Component;

class ConfirmationModal extends Component
{

    protected $listeners = ['delete-event' => 'delete'];

    public function delete($data)
    {
        switch( $data['type'] )
        {
            case 'user':
                if(User::find($data['id'])->exists())
                {
                    $user = User::find($data['id']);
                    $user->delete();
                }
                break;
            case 'product':
                if(Product::find($data['id'])->exists())
                {
                    $product = Product::find($data['id']);
                    $product->delete();
                }
                break;
            case 'unit':
                if(Unit::find($data['id'])->exists())
                {
                    $unit = Unit::find($data['id']);
                    $unit->delete();
                }
                break;
            case 'bundle':
                if(Bundle::find($data['id'])->exists())
                {
                    $bundle = Bundle::find($data['id']);
                    $bundle->delete();
                }
                break;
            case 'carton':
                if(Carton::find($data['id'])->exists())
                {
                    $carton = Carton::find($data['id']);
                    $carton->delete();
                }
                break;
            case 'palette':
                if(Palette::find($data['id']))
                {
                    $palette = Palette::find($data['id']);
                    $palette->delete();
                }
                break;
            case 'racking':
                if(Racking::find($data['id']))
                {
                    $racking = Racking::find($data['id']);
                    $racking->palette_id = null;
                    $racking->save();
                }
                break;
            default:
                break;

        }
        
        $this->emit('flash.message', ['info' =>  ucfirst($data['type']) . ' Deleted Successfully']);
        $this->emit('userDeleted', $data['data']);
        $this->emit('refreshDatatable');
    }

    public function render()
    {
        return view('livewire.confirmation-modal');
    }
}
