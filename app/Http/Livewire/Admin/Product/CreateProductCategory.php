<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Admin\Products\ProductCategory;

class CreateProductCategory extends Component
{
    public $title, $description, $status;

    public $data = [
        'title'  => 'required|min:5|max:50',
        'description'  => 'required|max:200',
        'status'  => 'required'
    ];

    public function render()
    {
        return view('livewire.admin.product.create-product-category');
    }

    public function createCategory(){

        $validatedData = $this->validate($this->data);

        ProductCategory::create($validatedData);

        session()->flash('message', 'product category created successfully');
        return redirect()->to('/product/createCategory');
    }

}
