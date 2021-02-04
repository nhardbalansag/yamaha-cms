<?php

namespace App\Http\Controllers\WebApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Products\Product;
use App\Models\Admin\Products\ProductSpecification;
use App\Models\Admin\Products\ProductCategory;
use Illuminate\Support\Facades\DB;

class HomeProductController extends Controller
{
    public function viewOne($id){

        $data['product'] = Product::where('id', $id)->first();
        $data['recommended'] = Product::where('status', 'publish')->get();

        $data['specification']  = DB::table('product_specifications')
                                ->where('product_id', $id)
                                ->get();

        $data['category']   = DB::table('product_categories')
                            ->where('id',  $data['product']->product_category_id)
                            ->first();

        return view('pages.web-app.home.pages.view-product.index', $data);
    }

}
