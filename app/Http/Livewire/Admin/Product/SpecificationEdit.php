<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SpecificationEdit extends Component
{

    public $title, $description, $status, $specsID, $productID;

    public $formdata = [
        'title'  => 'min:5|max:50',
        'description'  => 'max:200'
    ];

    public function render()
    {
        $data['specification'] = DB::table('product_specifications')->where('id', $this->specsID)->first();

        return view('livewire.admin.product.specification-edit', $data);
    }

    public function editProductSpecification(){

        $validatedData = $this->validate($this->formdata);

        $affected = DB::table('product_specifications')
        ->where('id', $this->specsID)
        ->update([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status
            ]);

        return redirect()->to('/product/view/' . $this->productID);
    }
}
