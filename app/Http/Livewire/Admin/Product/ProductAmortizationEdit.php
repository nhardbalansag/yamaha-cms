<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Admin\Amortization;
use Illuminate\Support\Facades\DB;

class ProductAmortizationEdit extends Component
{
    public $price, $amortization_id, $ProductId;

    public $data = [
        'price' => 'required|numeric|min:1|max:30000'
    ];

    public function render()
    {
        $monthDb = DB::table('amortizations')
                    ->where('id', $this->amortization_id)
                    ->first();

        return view('livewire.admin.product.product-amortization-edit');
    }

    public function editAmortization(){

        $validatedData = $this->validate($this->data);

        $affected = DB::table('amortizations')
                    ->where('id', $this->amortization_id)
                    ->update(['montly_amortization_price' => $this->price]);

        session()->flash('editAmortization', 'Amortization price updated');

        return redirect()->to('/product/view/' . $this->ProductId);
    }
}
