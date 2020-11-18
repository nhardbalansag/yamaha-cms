<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\Admin\Products\Product;
use App\Models\Admin\Products\ProductCategory;
use Illuminate\Support\Facades\DB;

class TopSort extends Component
{
    public function render()
    {
        $data['product'] = DB::select('
            SELECT count(id) as productCount
            FROM products
            WHERE (status = "publish")
        ');

        $category = DB::select('
            SELECT *
            FROM product_categories
            WHERE status = "publish"
        ');
        
        $productCategory = array();

        for($i = 0; $i < count($category); $i++){
            array_push( $productCategory, array(
                'id' => $category[$i]->id,
                'title' => $category[$i]->title
            ));
        }

        $data['productCategory'] = $productCategory;
        
        return view('livewire.home.top-sort', $data);
    }
}
