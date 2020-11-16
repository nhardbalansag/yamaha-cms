<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Admin\Products\Color;


class ColorCategory extends Component
{

    public $title, $description, $status, $product_id;

    public $data = [
        'title'  => 'required|min:5|max:50',
        'description'  => 'required|max:200',
        'status'  => 'required',
        'product_id'  => 'required'
    ];

    public function render()
    {
        return view('livewire.admin.product.color-category');
    }

    public function createColor(){

        $validatedData = $this->validate($this->data);

        Color::create($validatedData);

        session()->flash('message', 'color category created successfully');

    }


}
