<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FlashMessage extends Component
{
    protected $listeners = ['flash.message' => 'flashMessage'];


    public function flashMessage($message)
    {
        session()->flash('message', $message);
    }

    public function render()
    {
        return view('livewire.flash-message');
    }
}
