<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Admin\Products\SpecificationCategory;
use App\Models\Admin\Products\ProductSpecification;

class CreateSpecification extends Component
{
    public $title, $description, $status, $specification_category_id, $product_id;

    public $formdata = [
        'title'  => 'required|min:5|max:50',
        'description'  => 'required|max:200',
        'status'  => 'required',
        'specification_category_id'  => 'required|numeric',
        'product_id'  => 'required',
    ];

    public function render()
    {
        $data['specificationCategory'] = SpecificationCategory::where('status', 'publish')->get();
        return view('livewire.admin.product.create-specification', $data);
    }

    public function createProductSpecification(){

        $validatedData = $this->validate($this->formdata);

        ProductSpecification::create($validatedData);

        session()->flash('message', 'specification created successfully');
    }



}
