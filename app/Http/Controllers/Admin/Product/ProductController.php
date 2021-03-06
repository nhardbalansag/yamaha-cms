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

        if(!$data['product']){
            abort(404);
        }

        $data['product_specifications'] = DB::table('product_specifications')
                                        ->where('product_id', $id)
                                        ->get();

        $data['amortization'] = DB::table('amortizations')
                                        ->join('products', 'products.id', '=', 'amortizations.productId')
                                        ->where('amortizations.productId', $id)
                                        ->select('amortizations.*', 'products.id as ProductId')
                                        ->get();

        if(!$data['product_specifications']){
            abort(404);
        }

        if(!$data['product'] || !$data['product_specifications']){
            abort(404);
        }

        return view('pages.admin.products.view-one.view-one-product', $data);

    }

    public function pendingProduct(){
        $data['products'] = DB::table('products')
                            ->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
                            ->where('products.status', 'pending')
                            ->select('products.*', 'product_categories.title as categoryTitle')
                            ->paginate(10);

        return view('livewire.admin.product.view-all-product', $data);
    }

    public function publishProduct(){

        $data['products'] = DB::table('products')
                            ->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
                            ->where('products.status', 'publish')
                            ->select('products.*', 'product_categories.title as categoryTitle')
                            ->paginate(10);

        return view('livewire.admin.product.view-all-product', $data);
    }

    public function editProduct($productID){

        $data['product'] = DB::table('products')->where('id', $productID)->first();

        if(!$data['product']){
            abort(404);
        }

        $data['product'] = DB::table('products')
                            ->where('id', $productID)
                            ->first();

        return view('pages.admin.products.view-one.edit-product', $data);
    }

    public function editSpecifications($Id){

        $data['specifications'] = DB::table('product_specifications')->where('id', $Id)->first();

        if(!$data['specifications']){
            abort(404);
        }

        return view('pages.admin.products.view-one.edit-specification', $data);
    }

}
