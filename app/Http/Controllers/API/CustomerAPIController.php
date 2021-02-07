<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users\Inquiry;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Users\AccountVerification;
use Mail;
use App\Models\Admin\Products\Product;


class CustomerAPIController extends Controller
{
    protected $emailType = "inquiry";

    public function confirmVerification(Request $request){

        $validator = Validator::make($request->all(), [
            'verification' => ['required', 'numeric']
        ]);

        if(!$validator->fails()){

            $dataCount = DB::select('SELECT COUNT(*) as countdata
                                    FROM account_verifications
                                        WHERE customerId = ? AND verificationCode = ?', [Auth::user()->id, $request->verification]);

            if($dataCount[0]->countdata === 1){
                //update status
                $affected = User::where('id', Auth::user()->id)
                                    ->update(['verified' => true]);
                $response = true;
                $statusCode = 200;
            }else{
                $response = false;
                $statusCode = 200;
            }
        }else{
            $response = false;
            $statusCode = 200;
        }

        return response()->json($response,  $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }


    public function confirmEmail(Request $request){
        $emailType = "verification";

        $verification = rand(0, 10000);

        $data = [
            'verificationCode' =>  $verification,
            'customerId' =>  Auth::user()->id
        ];

        $email = [
            "first_name" => Auth::user()->first_name,
            "last_name" =>  Auth::user()->last_name,
            "middle_name" =>  Auth::user()->middle_name,
            "verification" =>  $verification,
            "email" =>   Auth::user()->email
        ];

        if(AccountVerification::create($data)){
            Mail::send(new \App\Mail\SendInquiry($emailType, $email));
            $response = false;
            $statusCode = 200;
        }else{
            $response = true;
            $statusCode = 200;
        }

        return response()->json($response ,  $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }


    public function getCount(Request $request){

        $account_info = DB::select('SELECT *
                        FROM users
                        WHERE id = ' . Auth::user()->id);
        $transactionData = DB::select('SELECT *, transactions.status as transactionStatus
                                                FROM transactions, users, products
                                                WHERE
                                                    (users.id = transactions.customerId AND products.id = transactions.productId) AND users.id = ' .  Auth::user()->id);
        $approval_percent = DB::select('SELECT COUNT(*) as data_count
                                                FROM customers_documents
                                                WHERE customers_documents.status = "approved" and customers_documents.customer_id = ' .  Auth::user()->id);
        $transactionCount = DB::select('SELECT COUNT(*) as transactionCount
                                                FROM transactions, users, products
                                                WHERE
                                                    (users.id = transactions.customerId AND products.id = transactions.productId) AND users.id = ' .  Auth::user()->id);
        $approval_result = round(($approval_percent[0]->data_count / 4) * 100);

        $response = array(
            "account_information" => $account_info,
            "transactionData" => $transactionData,
            "transactionCount" => $transactionCount,
            "approval_result_percent" => $approval_result
        );

        $statusCode = 200;

        return response()->json($response ,  $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'min:3|max:255'],
            'last_name' => ['required', 'string', 'min:3|max:255'],
            'middle_name' => ['string', 'min:3|max:255'],
            'home_address' => ['required', 'string', 'min:3|max:255'],
            'street_address' => ['required', 'string', 'min:3|max:255'],
            'country_region' => ['required', 'string', 'min:3|max:255'],
            'contact_number' => ['required', 'string', 'min:11'],
            'city' => ['required', 'string', 'min:3|max:255'],
            'role' => ['required', 'string'],
            'state_province' => ['required', 'string', 'min:3|max:255'],
            'verified' => ['required', 'numeric'],
            'postal' => ['required', 'numeric', 'min:4'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required']
        ]);

        $data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'home_address' => $request->home_address,
            'street_address' => $request->street_address,
            'country_region' => $request->country_region,
            'contact_number' => $request->contact_number,
            'city' => $request->city,
            'state_province' => $request->state_province,
            'postal' => $request->postal,
            'role' => $request->role,
            'verified' => $request->verified,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        );

        $errors = $validator->errors();

        $dataresponse = array(
            'first_name' => $errors->first('first_name'),
            'last_name' => $errors->first('last_name'),
            'middle_name' => $errors->first('middle_name'),
            'home_address' => $errors->first('home_address'),
            'street_address' => $errors->first('street_address'),
            'country_region' => $errors->first('country_region'),
            'contact_number' => $errors->first('contact_number'),
            'city' => $errors->first('city'),
            'state_province' => $errors->first('state_province'),
            'postal' => $errors->first('postal'),
            'role' => $errors->first('role'),
            'verified' => $errors->first('verified'),
            'email' => $errors->first('email'),
            'password' => $errors->first('password')
        );

       if(!$validator->fails()){
            User::create($data);
            $customerInformation = User::where('email', $request->email)->first();

            $token = $customerInformation->createToken('authToken')->accessToken;

            $dataresponse = array(
                "token" =>$token,
                "information" => $customerInformation
            );
       }
        return response()->json($dataresponse, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email','min:3|max:50'],
            'password' => ['required', 'string', 'min:5|max:255']
        ]);

        $errors = $validator->errors();

        if(!$validator->fails()){

            $data = DB::select('SELECT *
                                    FROM users
                                    WHERE email = ' . '"' .$request->email .'"');

            if(!empty($data)){
                $enteredPassword = $request->password;
                $DBpassword = $data[0]->password;
                $DBemail = $data[0]->email;
                $enteredEmail = $request->email;

                $password = Hash::check($enteredPassword, $DBpassword);

                $userData = User::where('email', $request->email)
                            ->first();

                $token = $userData->createToken('authToken')->accessToken;

                if($password && $enteredEmail === $DBemail){

                    $response = array_merge(
                        array("information" => $data),
                            array(
                                "status" => [
                                    "token" => $token,
                                    "error" => false,
                                    "type" => "data",
                                    "messsage" => "login success"
                                ]
                            )
                        );
                }else{
                    $response = array_merge(
                        array("information" => null),
                            array(
                                "status" => [
                                    "token" => null,
                                    "error" => true,
                                    "type" => "data",
                                    "messsage" => "no matching records"
                                ]
                            )
                        );
                }
            }else{
                $response = array_merge(
                    array("information" => $data),
                        array(
                            "status" => [
                                "token" => null,
                                "error" => true,
                                "type" => "data",
                                "messsage" => "no matching records"
                            ]
                        )
                    );
            }

        }else{
            $response = array_merge(
                array("information" => null),
                    array(
                        "status" => [
                            "token" => null,
                            "error" => true,
                            "type" => "validation",
                            "messsage" => array(
                                'email' => $errors->first('email'),
                                'password' => $errors->first('password')
                            )
                        ]
                    )
                );
        }

        return response()->json($response, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function sendInquiry(Request $request){


        $validator = Validator::make($request->all(), [
            'productId' => ['required', 'numeric']
        ]);

        $data = array(
            'first_name' => Auth::user()->first_name,
            'last_name' =>  Auth::user()->last_name,
            'middle_name' =>  Auth::user()->middle_name,
            'email_address' =>  Auth::user()->email,
            'home_address' =>  Auth::user()->home_address,
            'street_address' =>  Auth::user()->street_address,
            'country_region' =>  Auth::user()->country_region,
            'contact_number' =>  Auth::user()->contact_number,
            'city' =>  Auth::user()->city,
            'state_province' =>  Auth::user()->state_province,
            'postal' =>  Auth::user()->postal,
            'productId' => $request->productId
        );

        $errors = $validator->errors();

        if(!$validator->fails()){
            Inquiry::create($data);
            $response = true;
            $statusCode = 200;

            $productData['allusersData'] =  $data;
            $productData['product'] = Product::where('id', $request->productId)->first();
            $productData['specification'] = DB::select('
                SELECT product_specifications.title as title, product_specifications.description as description
                FROM product_specifications, products
                WHERE (product_specifications.status = "publish") AND (product_specifications.product_id = ' . $request->productId . ')
                GROUP BY product_specifications.title, product_specifications.description');

            Mail::send(new \App\Mail\SendInquiry($this->emailType, $productData));

        }else{
            $response = false;
            $statusCode = 200;
        }

        return response()->json($response ,  $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function EditCustomerRecord(Request $request){

        $typeVariable = array(
            "first_name"=> "first_name",
            "last_name"=> "last_name",
            "middle_name"=> "middle_name",
            "home_address"=> "home_address",
            "street_address"=> "street_address",
            "country_region"=> "country_region",
            "contact_number"=> "contact_number",
            "city"=> "city",
            "state_province"=> "state_province",
            "postal"=> "postal",
            "email"=> "email",
            "password"=> "password"
        );

        if($request->type === $typeVariable['email']){

            $emailstatus = DB::select('select verified from users where id = ?', [Auth::user()->id]);
            $emailstatus = $emailstatus[0]->verified;
            $sample = array(
                "id"=> Auth::user()->id,
                "email"=> $request->data
            );
            $validator = Validator::make($sample, [
                'id' => ['required', 'numeric'],
                'email' => ['required', 'email', 'unique:users']
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'data' => ['required']
            ]);
        }
        $validator = Validator::make($request->all(), [
            'data' => ['required']
        ]);

        if(!$validator->fails()){

            switch ($request->type) {
                case $typeVariable['first_name']:
                    $affected = User::where('id', Auth::user()->id)
                                        ->update(['first_name' => $request->data]);
                    $statusCode = 200;
                    $response = true;
                    break;
                case $typeVariable['last_name']:
                    $affected = User::where('id', Auth::user()->id)
                                        ->update(['last_name' => $request->data]);
                    $statusCode = 200;
                    $response = true;
                    break;
                case $typeVariable['middle_name']:
                    $affected = User::where('id', Auth::user()->id)
                                        ->update(['middle_name' => $request->data]);
                    $statusCode = 200;
                    $response = true;
                    break;
                case $typeVariable['home_address']:
                    $affected = User::where('id', Auth::user()->id)
                                        ->update(['home_address' => $request->data]);
                    $statusCode = 200;
                    $response = true;
                    break;
                case $typeVariable['street_address']:
                    $affected = User::where('id', Auth::user()->id)
                                        ->update(['street_address' => $request->data]);
                    $statusCode = 200;
                    $response = true;
                    break;
                case $typeVariable['country_region']:
                    $affected = User::where('id', Auth::user()->id)
                                        ->update(['country_region' => $request->data]);
                    $statusCode = 200;
                    $response = true;
                    break;
                case $typeVariable['contact_number']:
                    $affected = User::where('id', Auth::user()->id)
                                        ->update(['contact_number' => $request->data]);
                    $statusCode = 200;
                    $response = true;
                    break;
                case $typeVariable['city']:
                    $affected = User::where('id', Auth::user()->id)
                                        ->update(['city' => $request->data]);
                    $statusCode = 200;
                    $response = true;
                    break;
                case $typeVariable['state_province']:
                    $affected = User::where('id', Auth::user()->id)
                                        ->update(['state_province' => $request->data]);
                    $statusCode = 200;
                    $response = true;
                    break;
                case $typeVariable['postal']:
                    $affected = User::where('id', Auth::user()->id)
                                        ->update(['postal' => $request->data]);
                    $statusCode = 200;
                    $response = true;
                    break;
                case $typeVariable['email']:
                    if($emailstatus === 1){
                        $response = false;
                        $statusCode = 200;
                    }else{
                        User::where('id', Auth::user()->id)
                                    ->update(['email' => $request->data]);
                        $statusCode = 200;
                        $response = true;
                    }
                    break;
                case $typeVariable['password']:
                    $newPassword = Hash::make($request->data);
                    $affected = User::where('id', Auth::user()->id)
                                        ->update(['password' => $newPassword]);
                    $statusCode = 200;
                    $response = true;
                    break;
            }
        }else{
            $response = false;
            $statusCode = 200;
        }
        return response()->json($response , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}





