<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;

class Staff extends Component
{
    public function render()
    {
        return view('livewire.staff.staff')->extends('layouts.app');
    }
}
