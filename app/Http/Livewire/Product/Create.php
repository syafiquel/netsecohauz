<?php

namespace App\Http\Livewire\Product;

use App\Models\Industry;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\BrandOwner;
use Livewire\Component;

class Create extends Component
{

    public $name, $category, $industry, $brand_owner, $categories, $brand_owners, $industries, $selected_category, $selected_industry, $selected_brand_owner;

    protected $rules = [
        'name' => 'required',
        'category' => 'required',
        'industry' => 'required',
        'brand_owner' => 'required',
    ];

    public function mount()
    {
        $this->categories = ProductCategory::all();
        $this->industries = Industry::all();
        $this->brand_owners = BrandOwner::all();
    }

    public function store()
    {
        $this->validate();

        $category_id = $this->categories->where('name', $this->category)->first()->id;
        $industry_id = $this->industries->where('name', $this->industry)->first()->id;
        $brand_owner_id = $this->brand_owners->where('name', $this->brand_owner)->first()->id;

        $user = Product::create([

            'name' => $this->name,
            'category_id' => $category_id,
            'industry_id' => $industry_id,
            'brand_owner_id' => $brand_owner_id,
        ]);

        $this->emit('flash.message', ['info' => 'Product Created Successfully']);
        $this->emit('userStore');
        $this->emit('refreshDatatable');

    }

    public function render()
    {
        return view('livewire.product.create');
    }
}
