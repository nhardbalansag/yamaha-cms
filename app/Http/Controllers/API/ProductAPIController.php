<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin\Products\Product;

class ProductAPIController extends Controller
{
    public function index(Request $request){

        $secret = "capstoneProject2020-2021";
        $token = $request->bearerToken();

        $validateTOKEN = Hash::check( $secret, $token);

        if(!$validateTOKEN){
            $data = "Unauthorized";
            $statusCode = 401;
        }else{
            $statusCode = 200;
            $data = Product::where('status', 'publish')->get();
        }

        return response()->json($data , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
