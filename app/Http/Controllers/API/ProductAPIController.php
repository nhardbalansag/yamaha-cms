<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Products\Product;
use App\Models\Users\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductAPIController extends Controller
{

    public $secret = "capstoneProject2020-2021";


    public function getOrder(Request $request){
     
        $validator = Validator::make($request->all(), [
            'orderstatus' => ['required', 'string', 'max:20']
        ]);

        if(!$validator->fails()){

            $response = DB::select('SELECT *, transactions.status as transactionStatus
                                    FROM transactions, users, products
                                    WHERE
                                        (users.id = transactions.customerId AND products.id = transactions.productId)
                                        AND transactions.status = '. '"' .$request->orderstatus .'"' . ' AND users.id = ' . Auth::user()->id);

            $count = DB::select('SELECT COUNT(*) as transactionCount
                                    FROM transactions, users, products
                                    WHERE
                                        (users.id = transactions.customerId AND products.id = transactions.productId)
                                        AND transactions.status = '. '"' .$request->orderstatus .'"' . ' AND users.id = ' . Auth::user()->id);
            $response = array(
                "transactionData" => $response,
                "transactionCount" => $count
            );

            $statusCode = 200;

        }else{

            $response = false;
            $statusCode = 200;

        }

        return response()->json($response , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function index(Request $request){
            $statusCode = 200;
            $data = Product::where('status', 'publish')->get();

        return response()->json(Auth::user()->email , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function getoneProduct(Request $request){
        
        $statusCode = 200;
        $product = Product::where('id', $request->id)->get();
        $specification = DB::select('SELECT
                                            product_specifications.title as title,
                                            product_specifications.id as id,
                                            product_specifications.description as description

                                            FROM product_specifications, products
                                            WHERE (product_specifications.status = "publish") AND (product_specifications.product_id = ' .  $request->id . ')
                                            GROUP BY
                                            product_specifications.title,
                                            product_specifications.description,
                                            product_specifications.id');

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
                "Percentage" => round($totalpercentage)
            )
        );

        return response()->json($reponse , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
