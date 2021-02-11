<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Admin\Amortization;
use Illuminate\Support\Facades\DB;

class ProductAmortization extends Component
{
    public $months, $price, $product_id;

    public $data = [
        'months' => 'required|numeric|max:36|min:12',
        'price' => 'required|numeric|min:1|max:30000'
    ];

    public function render()
    {
        return view('livewire.admin.product.product-amortization');
    }

    public function addAmortization(){

        $validatedData = $this->validate($this->data);

        $monthDb = DB::table('amortizations')
                    ->where('month', $this->months)
                    ->where('productId', $this->product_id)
                    ->count();

        if($monthDb <= 0){

            $formData = [
                'productId' => $this->product_id,
                'month' => $this->months,
                'montly_amortization_price' => $this->price
            ];

            Amortization::create($formData);

            session()->flash('addAmortizationmessage', 'Amortization created successfully');

        }else{

            session()->flash('addAmortizationmessage', 'Month already exist');

        }
        return redirect()->to('/product/view/' . $this->product_id);
    }
}


