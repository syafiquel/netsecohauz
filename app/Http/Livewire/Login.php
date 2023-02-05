<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{

    public function registerRedirect() {
        return redirect()->route('register');
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('auth.login')->layout('layouts.guest');
    }
}
