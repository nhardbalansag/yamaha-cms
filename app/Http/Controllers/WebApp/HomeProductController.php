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

        $data['specification'] = DB::select('SELECT
                                                product_specifications.title as title,
                                                product_specifications.description as description

                                                FROM product_specifications, products
                                                WHERE (product_specifications.status = "publish") AND (product_specifications.product_id = ' . $id . ')
                                                GROUP BY
                                                product_specifications.title,
                                                product_specifications.description');

        $data['category'] = DB::select('SELECT product_categories.title
                                        FROM product_categories, products
                                        WHERE product_categories.id = ' . $data['product']->product_category_id .
                                        ' GROUP BY product_categories.title' );

        return view('pages.web-app.home.pages.view-product.index', $data);
    }



}
