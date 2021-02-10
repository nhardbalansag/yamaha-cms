<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class ProductEdit extends Component
{
    use WithFileUploads;

    public $photo_path, $title, $description, $status, $update_count, $price, $product_category_id, $specification_id, $colors_type_id, $number_available, $DBproduct_id;

    public function render()
    {
        $data['productData'] = DB::table('products')->where('id', $this->DBproduct_id)->first();

        return view('livewire.admin.product.product-edit', $data);
    }

    public function updateProduct(){

        $affected = DB::table('products')
                ->where('id', $this->DBproduct_id)
                ->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'price' => $this->price
                    ]);


        session()->flash('editProduct', 'Product Edited successfully');
        return redirect()->to('/product/view/' . $this->DBproduct_id);
    }// end function

}
