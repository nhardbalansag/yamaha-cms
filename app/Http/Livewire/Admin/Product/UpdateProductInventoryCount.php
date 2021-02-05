<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class UpdateProductInventoryCount extends Component
{
    public $count, $product_id;

    public $data = [
        'count' => 'required|numeric|min:1'
    ];

    public function render()
    {
        return view('livewire.admin.product.update-product-inventory-count');
    }

    public function updateInventoryCount(){

        $validatedData = $this->validate($this->data);

        $affected = DB::table('products')
                    ->where('id', $this->product_id)
                    ->update(['number_available' => $validatedData['count']]);

        session()->flash('inventoryMessage', 'inventory count updated');
        return redirect()->to('/product/view/'. $this->product_id);
    }
}
