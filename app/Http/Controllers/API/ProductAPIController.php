<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin\Products\Product;
use Illuminate\Support\Facades\DB;

class ProductAPIController extends Controller
{

    public $secret = "capstoneProject2020-2021";

    public function index(Request $request){
        $token = $request->bearerToken();
        $validateTOKEN = Hash::check( $this->secret, $token);

        if(!$validateTOKEN){
            $data = "Unauthorized";
            $statusCode = 401;
        }else{
            $statusCode = 200;
            $data = Product::where('status', 'publish')->get();
        }

        return response()->json($data , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function getoneProduct(Request $request){
        $token = $request->bearerToken();
        $validateTOKEN = Hash::check( $this->secret, $token);

        if(!$validateTOKEN){
            $reponse = "Unauthorized";
            $statusCode = 401;
        }else{
            $statusCode = 200;
            $product = Product::where('id', $request->id)->get();
            $specification = DB::select('SELECT
                                                product_specifications.title as title,
                                                product_specifications.description as description

                                                FROM product_specifications, products
                                                WHERE (product_specifications.status = "publish") AND (product_specifications.product_id = ' .  $request->id . ')
                                                GROUP BY
                                                product_specifications.title,
                                                product_specifications.description');

            $inquiries = DB::select('SELECT COUNT(id) as inquiries
                                        FROM inquiries
                                        WHERE productId = ?', [$request->id]);

            $inquiriesCount = DB::select('SELECT COUNT(id) as inquiriesCount
                                           FROM inquiries');

            $totalpercentage = $inquiriesCount > 0 ? ($inquiries[0]->inquiries / $inquiriesCount[0]->inquiriesCount) * 100 : 0;

            $reponse = array(
                "data" =>  array(
                    "product" => $product,
                    "specification" => $specification,
                    "inquiriesCount" => $inquiries[0]->inquiries,
                    "Percentage" => $totalpercentage
                )
            );

        }
        return response()->json($reponse , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
