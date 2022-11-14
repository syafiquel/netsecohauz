<?php

namespace App\Http\Livewire\Staff;

use App\Models\User;
use App\Models\Staff;
use App\Models\Department;
use Livewire\Component;

class Update extends Component
{

    public $user_id, $first_name, $last_name, $address_1, $address_2, $postcode, $city, $state, $country, $name, $email, $password, $phone, $department;
    public $selected_state, $selected_department, $user, $departments;

    public $states = [
        'johor',
        'kedah',
        'kelantan',
        'melaka',
        'negeri_sembilan',
        'pahang',
        'perak',
        'perlis',
        'perlis',
        'sabah',
        'sarawak',
        'selangor',
        'terengganu',
        'kuala_lumpur',
    ];

    public function mount($id)
    {
        $user = User::with('staff')->where('id', $id)->first();
        $this->user = $user;
        $this->user_id = $id;
        $this->username = $user->name;
        $this->email = $user->email;
        $this->first_name = $user->staff->first_name;
        $this->last_name = $user->staff->last_name;
        $this->address_1 = $user->staff->address_1;
        $this->address_2 = $user->staff->address_2;
        $this->postcode = $user->staff->postcode;
        $this->city = $user->staff->city;
        $this->state = $user->staff->state;
        $this->country = $user->staff->country;
        $this->phone = $user->staff->phone;
        $this->department = $user->staff->department;
        $this->selected_state = $this->state;
        $this->selected_department = $this->department;
        $this->departments = Department::pluck('name')->toArray();
        
    }

    public function save()
    {
        $this->user->email = $this->email;
        $this->user->staff->first_name = $this->first_name;
        $this->user->staff->last_name = $this->last_name;
        $this->user->staff->address_1 = $this->address_1;
        $this->user->staff->address_2 = $this->address_2;
        $this->user->staff->city = $this->city;
        $this->user->staff->state = $this->state;
        $this->user->staff->postcode = $this->postcode;
        $this->user->staff->country = $this->country;
        $this->user->staff->phone = $this->phone;
        $this->user->staff->department = $this->department;
        $this->user->push();

        $this->emit('flash.message', ['info' => 'User Updated Successfully']);
    }

    public function updatedDepartment()
    {
        $this->selected_department = $this->department;
    }

    public function updatedState()
    {
        $this->selected_state = $this->state;
    }

    public function render()
    {
        return view('livewire.staff.update');
    }
}
