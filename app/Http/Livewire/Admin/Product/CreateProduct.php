<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Admin\Products\Product;
use Livewire\WithFileUploads;
use App\Models\Admin\Products\ProductCategory;
use App\Models\Admin\Products\ColorType;
use App\Models\Admin\Products\Specification;
use Illuminate\Support\Facades\DB;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $photo_path, $title, $description, $status, $update_count, $price, $product_category_id, $specification_id, $colors_type_id;

    public $data = [
        'photo_path' => 'required|image|max:1024', 
        'title' => 'required',
        'description' => 'required',
        'status' => 'required',
        'price' => 'required|numeric',
        'product_category_id' => 'required'
    ];

    public function render()
    {
        $data['productCategory'] = ProductCategory::where('status', 'publish')->get();

        return view('livewire.admin.product.create-product', $data);
    }

    public function createProduct(){
       
        $validatedData = $this->validate($this->data);

        $formData = [
            'photo_path' => $this->photo_path->store('photos'), 
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'price' => $this->price,
            'product_category_id' => $this->product_category_id
        ];

        Product::create($formData);

        session()->flash('message', 'product created successfully');
        return redirect()->to('/product/create');
    }// end function


}
