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
use Carbon\Carbon;
use App\Models\Users\ServiceReservation;

class ProductAPIController extends Controller
{

    public $secret = "capstoneProject2020-2021";

    public function searchProducts($search){

        $data = DB::table('products')
                ->orWhere('title', 'like', '%' . $search . '%')
                ->where('status', 'publish')
                ->paginate(10);

        return response()->json($data , 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function getOrder(Request $request, $limit){

        $validator = Validator::make($request->all(), [
            'orderstatus' => ['required', 'string', 'max:20']
        ]);

        if(!$validator->fails()){

            $response = DB::table('transactions')
                        ->join('users', 'users.id', '=', 'transactions.customerId')
                        ->join('products', 'products.id', '=', 'transactions.productId')
                        ->select('products.*', 'transactions.id as transactionId', 'transactions.status as transactionStatus', 'transactions.created_at as transactionCreated')
                        ->where('transactions.status', $request->orderstatus)
                        ->where('users.id', Auth::user()->id)
                        ->paginate($limit);

            $statusCode = 200;

        }else{

            $response = false;
            $statusCode = 200;

        }

        return response()->json($response , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function index($limit){
            $statusCode = 200;
            $data = Product::where('status', 'publish')->paginate($limit);

        return response()->json( $data  , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function getoneProduct(Request $request){

        $statusCode = 200;
        $product = Product::where('id', $request->id)->get();

        $specification = DB::table('product_specifications')
                        ->where('product_id', $request->id)
                        ->where('status', "publish")
                        ->get();

        $inquiries = DB::table('inquiries')->where('productId', $request->id)->count();

        $inquiriesCount = DB::table('inquiries')->count();

        $totalpercentage = $inquiriesCount > 0 ? ($inquiries / $inquiriesCount) * 100 : 0;

        $reponse = array(
            "data" =>  array(
                "product" => $product,
                "specification" => $specification,
                "inquiriesCount" => $inquiries,
                "Percentage" => round($totalpercentage)
            )
        );

        return response()->json($reponse , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function reserveDate(Request $request){
        $now = Carbon::now('UTC');

        $personalReservationCount = DB::table('service_reservations')
                            ->where('reservationDate', $request->reservedDate)
                            ->where('customerId', Auth::user()->id)
                            ->count();

        $allReservationCount = DB::table('service_reservations')
                            ->where('reservationDate', $request->reservedDate)
                            ->count();

        $userReservationData = DB::table('service_reservations')
                            ->where('reservationDate', $request->reservedDate)
                            ->where('customerId', Auth::user()->id)
                            ->first();

        if($now > $request->reservedDate || $request->reservedDate === $now ||  $userReservationData !== null || $personalReservationCount > 0 || $allReservationCount >= 5){
            $response = "Selected date is not available";
        }else{

            $formData = [
                'customerId' => Auth::user()->id,
                'status' => "ongoing",
                'reservationDate' => $request->reservedDate
            ];

            ServiceReservation::create($formData);

            $response = "You have placed reservation successfully.";
        }

        return response()->json($response , 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }


    public function getReservationsList(){

        $data = DB::table('service_reservations')
                            ->where('customerId', Auth::user()->id)
                            ->paginate();


        return response()->json($data , 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
