<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class UpdateProductStatus extends Component
{
    public $status, $product_id;

    public $data = [
        'status' => 'required'
    ];

    public function render()
    {
        return view('livewire.admin.product.update-product-status');
    }

    public function updateProductStatus(){

        $validatedData = $this->validate($this->data);

        $affected = DB::table('products')
                    ->where('id', $this->product_id)
                    ->update(['status' => $validatedData['status']]);

        session()->flash('message', 'status updated');
        return redirect()->to('/product/view/'. $this->product_id);
    }
}
