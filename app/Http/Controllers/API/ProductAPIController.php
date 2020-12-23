<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Products\Product;

class ProductAPIController extends Controller
{
    public function index(){
        $data = Product::where('status', 'publish')->get();

        return response()->json($data, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
