<?php

namespace App\Http\Controllers\WebApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Products\Product;

class InquiryController extends Controller
{
    public function index($id){
        
        $data['product'] = Product::where('id', $id)->first();

        return view('pages.web-app.home.pages.inquiry.index', $data);
    }
}
