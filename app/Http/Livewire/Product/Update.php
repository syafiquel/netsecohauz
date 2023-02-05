<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\BrandOwner;
use App\Models\Industry;
use Livewire\Component;

class Update extends Component
{

    public $selected_industry, $selected_category, $name, $departments, $industries, $category, $industry, $product;
    public $selected_brand_owner, $brand_owners, $brand_owner; 

    public function mount($id)
    {
        $this->product = Product::find($id);
        $this->name = $this->product->name;
        $this->industries = Industry::pluck('name')->toArray();
        $this->categories = ProductCategory::pluck('name')->toArray();
        $this->brand_owners = BrandOwner::pluck('name')->toArray();
        $this->category = $this->product->category->name;
        $this->industry = $this->product->industry->name;
        $this->brand_owner = $this->product->brand_owner->name;
        $this->selected_category = $this->category;
        $this->selected_industry = $this->industry;
        $this->selected_brand_owner = $this->brand_owner;
    }

    public function save()
    {
        $this->product->name = $this->name;
        $this->product->industry->name = $this->industry;
        $this->product->category->name = $this->category;
        $this->product->brand_owner->name = $this->brand->owner;
        $this->product->save();

        $this->emit('flash.message', ['info' => 'Product Updated Successfully']);
    }

    public function updatedIndustry()
    {
        $this->selected_industry = $this->industry;
    }

    public function updatedCategory()
    {
        $this->selected_category = $this->category;
    }

    public function render()
    {
        return view('livewire.product.update');
    }
}
