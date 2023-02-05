<?php

namespace App\Http\Livewire\BrandOwner;

use App\Models\User;
use Livewire\Component;

class Update extends Component
{

    public $user_id, $name, $address_1, $address_2, $postcode, $city, $state, $country, $email, $password, $phone, $website;
    public $selected_state, $user;

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
        $user = User::with('brand_owner')->where('id', $id)->first();
        $this->user = $user;
        $this->user_id = $id;
        $this->username = $user->name;
        $this->email = $user->email;
        $this->name = $user->brand_owner->name;
        $this->address_1 = $user->brand_owner->address_1;
        $this->address_2 = $user->brand_owner->address_2;
        $this->postcode = $user->brand_owner->postcode;
        $this->city = $user->brand_owner->city;
        $this->state = $user->brand_owner->state;
        $this->country = $user->brand_owner->country;
        $this->phone = $user->brand_owner->phone;
        $this->website = $user->brand_owner->website;
        $this->selected_state = $this->state;
        
    }

    public function save()
    {
        $this->user->email = $this->email;
        $this->user->brand_owner->name = $this->name;
        $this->user->brand_owner->address_1 = $this->address_1;
        $this->user->brand_owner->address_2 = $this->address_2;
        $this->user->brand_owner->city = $this->city;
        $this->user->brand_owner->state = $this->state;
        $this->user->brand_owner->postcode = $this->postcode;
        $this->user->brand_owner->country = $this->country;
        $this->user->brand_owner->phone = $this->phone;
        $this->user->brand_owner->website = $this->website;
        $this->user->push();

        $this->emit('flash.message', ['info' => 'User Updated Successfully']);
    }

    public function updatedState()
    {
        $this->selected_state = $this->state;
    }

    public function render()
    {
        return view('livewire.brand-owner.update');
    }
}
