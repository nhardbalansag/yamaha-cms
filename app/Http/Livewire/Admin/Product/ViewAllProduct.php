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
        $data['products'] = DB::select('
        SELECT 
            product_categories.title as categoryTitle,
            products.id as products_id,
            products.photo_path as products_photo_path,
            products.title as products_title,
            products.description as products_description,
            products.status as products_status,
            products.price as products_price,
            products.created_at as products_created_at
        
        FROM products, product_categories
        WHERE products.product_category_id = product_categories.id
        LIMIT 0,10');
        
        return view('livewire.admin.product.view-all-product', $data);
    }

    
}
