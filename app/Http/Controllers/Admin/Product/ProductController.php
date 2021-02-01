<?php

namespace App\Http\Controllers\Admin\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Products\Product;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('pages.admin.products.create.index');
    }

    public function productIndex(){

        return view('pages.admin.products.product-index.index');
    }

    public function viewAll(){

        return view('pages.admin.products.product-index.view-all');

    }

    public function viewOne($id){

        $data['product'] = DB::table('products')->where('id', $id)->first();
        $data['product_specifications'] = DB::table('product_specifications')
                            ->where('product_id', $data['product']->id)
                            ->get();

        return view('pages.admin.products.view-one.view-one-product', $data);

    }

    public function pendingProduct(){
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
        WHERE products.product_category_id = product_categories.id AND products.status = "pending"
        LIMIT 0,10');

        return view('livewire.admin.product.view-all-product', $data);
    }

    public function publishProduct(){
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
        WHERE products.product_category_id = product_categories.id AND products.status = "publish"
        LIMIT 0,10');

        return view('livewire.admin.product.view-all-product', $data);
    }


}
