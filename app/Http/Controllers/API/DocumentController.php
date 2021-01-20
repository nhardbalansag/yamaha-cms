<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    public $secret = "capstoneProject2020-2021";

    public function viewAllDocumentCategory(Request $request){

        $response = DB::select('SELECT *
                    FROM document_categories');
        $statusCode = 200;

        return response()->json($response , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function submitDocument(Request $request){

        $token = $request->bearerToken();
        $validateTOKEN = Hash::check( $this->secret, $token);

        $validator = Validator::make($request->all(), [
            'id' => ['required', 'numeric'],
            'orderstatus' => ['required', 'string', 'max:20']
        ]);

        if(!$validateTOKEN){
            $response = "Unauthorized";
            $statusCode = 401;
        }else{
            if(!$validator->fails()){

                $response = DB::select('SELECT *, transactions.status as transactionStatus
                                        FROM transactions, users, products
                                        WHERE
                                            (users.id = transactions.customerId AND products.id = transactions.productId)
                                            AND transactions.status = '. '"' .$request->orderstatus .'"' . ' AND users.id = ' . $request->id);

                $count = DB::select('SELECT COUNT(*) as transactionCount
                                        FROM transactions, users, products
                                        WHERE
                                            (users.id = transactions.customerId AND products.id = transactions.productId)
                                            AND transactions.status = '. '"' .$request->orderstatus .'"' . ' AND users.id = ' . $request->id);
                $response = array(
                    "transactionData" => $response,
                    "transactionCount" => $count
                );
                $statusCode = 200;
           }else{
                $response = false;
                $statusCode = 200;
           }
        }

        return response()->json($response , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
