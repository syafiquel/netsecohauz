<?php

namespace App\Http\Livewire\Client;

use App\Models\BrandOwner;
use Livewire\Component;

class Client extends Component
{

    public $clients, $name, $website, $client_id;
    public $isOpen = 0;

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'website' => 'required',
        ]);
        BrandOwner::updateOrCreate(['id' => $this->client_id], [
        'name' => $this->name,
        'website' => $this->website
        ]);
        session()->flash('message', $this->client_id ? 'Brand Owner Updated Successfully.' : 'Brand Owner Created Successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }


    public function delete($id)
    {
        BrandOwner::find($id)->delete();
        session()->flash('message', 'Category Deleted Successfully.');
    }

    public function edit($id)
    {
        $client = BrandOwner::findOrFail($id);
        $this->client_id = $id;
        $this->name = $client->name;
        $this->website = $client->website;
        $this->openModal();
    }

    public function create()
    {
        // $this->resetInputFields();
        // $this->openModal();
        return redirect('/user/client/create');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->website = '';
        $this->client_id = '';
    }

    public function render()
    {
        $this->clients = BrandOwner::all();
        return view('livewire.client.client');
    }
}
