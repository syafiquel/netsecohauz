<?php

namespace App\Http\Livewire\BrandOwner;

use App\Models\Industry;
use App\Models\User;
use App\Models\UserIndustries;
use App\Models\BrandOwner;
use Livewire\Component;

class Create extends Component
{

    public $name, $email, $phone, $password;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'phone' => 'required',
    ];

    public function mount()
    {

    }

    public function store()
    {
        $this->validate();


        $user = User::create([

            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        BrandOwner::create([

            'user_id' => $user->id,
            'phone' => $this->phone,

        ]);


        $user->assignRole('brand owner');
        $this->emit('flash.message', ['info' => 'User Created Successfully']);
        $this->emit('userStore');
        $this->emit('refreshDatatable');

    }

    public function render()
    {
        return view('livewire.brand-owner.create');
    }
}
