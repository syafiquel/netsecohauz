<?php

namespace App\Http\Livewire\BrandOwner;

use Livewire\Component;

class BrandOwner extends Component
{
    public function render()
    {
        return view('livewire.brand-owner.brand-owner')->extends('layouts.app');;
    }
}
