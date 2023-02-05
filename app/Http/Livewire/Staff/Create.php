<?php

namespace App\Http\Livewire\Staff;

use App\Models\Industry;
use App\Models\User;
use App\Models\Staff;
use App\Models\Department;
use Livewire\Component;

class Create extends Component
{

    public $name, $email, $phone, $password, $departments, $department, $selected_department;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'phone' => 'required',
        'department' => 'required',
    ];

    public function mount()
    {
        $this->departments = Department::all();
    }

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
            'department' => $this->department,

        ]);

        $user->assignRole('staff');
        $this->emit('flash.message', ['info' => 'User Created Successfully']);
        $this->emit('userStore');
        $this->emit('refreshDatatable');

    }

    public function updatedDepartment()
    {
        $this->selected_department = $this->department;
    }

    public function render()
    {
        return view('livewire.staff.create')->extends('layouts.app')->slot('card_header');
    }
}

