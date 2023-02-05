<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Staff;
use Livewire\Component;


class Create extends Component
{

    public $name, $email, $password, $phone;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'phone' => 'required',
    ];

    public function store()
    {

        $this->validate();
        
        $user = User::create([

            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        Staff::create([

            'user_id' => $user->id,
            'phone' => $this->phone,
            'department' => 'admin',
        ]);

        $user->assignRole('admin');
        $this->resetInputFields();
        $this->emit('flash.message', ['info' => 'User Created Successfully']);
        $this->emit('userStore');
        $this->emit('refreshDatatable');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->username = '';
        $this->phone = '';
    }


    public function render()
    {
        return view('livewire.admin.create')->extends('layouts.app');
    }
}
