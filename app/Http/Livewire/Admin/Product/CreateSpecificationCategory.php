<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Admin\Products\SpecificationCategory;


class CreateSpecificationCategory extends Component
{

    public $title, $description, $status;

    public $data = [
        'title'  => 'required|min:5|max:50',
        'description'  => 'required|max:200',
        'status'  => 'required'
    ];

    public function render()
    {
        return view('livewire.admin.product.create-specification-category');
    }


    public function createCategory(){

        $validatedData = $this->validate($this->data);

        $productCategory = [
            'title'  => $this->title,
            'description' => $this->description,
            'status' => $this->status
        ];

        SpecificationCategory::create($validatedData);

        session()->flash('message', 'specification category created successfully');
        return redirect()->to('/product/specificationCategory/create');
    }

}
