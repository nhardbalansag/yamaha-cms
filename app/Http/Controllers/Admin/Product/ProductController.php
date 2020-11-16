<?php

namespace App\Http\Controllers\Admin\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Products\Product;


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

        $data['product'] = Product::where('id', $id)->first();

        return view('pages.admin.products.view-one.view-one-product', $data);

    }
   
   
}
