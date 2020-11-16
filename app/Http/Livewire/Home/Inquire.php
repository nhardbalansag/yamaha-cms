<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\Admin\Products\Product;


class Inquire extends Component
{
    public $productId;


    public function render(){

        $data['product'] = Product::where('id', $this->productId)->first();

        return view('livewire.home.inquire', $data);
    }
}
