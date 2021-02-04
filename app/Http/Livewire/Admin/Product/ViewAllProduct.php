<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Admin\Products\Product;
use App\Models\Admin\Products\ProductCategory;
use Illuminate\Support\Facades\DB;

class ViewAllProduct extends Component
{
    public function render()
    {

        $data['products'] = DB::table('products')
                    ->join('product_categories', 'product_categories.id', '=', 'products.product_category_id')
                    ->select('products.*', 'product_categories.title as categoryTitle')
                    ->paginate(10);

        return view('livewire.admin.product.view-all-product', $data);
    }

}
