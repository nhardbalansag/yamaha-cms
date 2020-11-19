<?php

namespace App\Http\Controllers\WebApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Products\Product;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['recommended'] = Product::where('status', 'publish')->get();
        $data['product'] = Product::where('status', 'publish')->get();
        
        return view('pages.web-app.home.pages.home.index', $data);
    }

}
