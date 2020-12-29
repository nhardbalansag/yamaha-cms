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
use Mail;
use App\Models\Admin\Products\Product;

class CustomerAPIController extends Controller
{
    private $secret = 'capstoneProject2020-2021';
    protected $emailType = "inquiry";

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
            $dataresponse = array("token" =>Hash::make($this->secret));
       }

        return response()->json($dataresponse, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

    }


    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'min:3|max:50'],
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
                $token = Hash::make($this->secret);

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
            'first_name' => ['required', 'string', 'min:3|max:255'],
            'last_name' => ['required', 'string', 'min:3|max:255'],
            'middle_name' => ['string', 'min:3|max:255'],
            'home_address' => ['required', 'string', 'min:3|max:255'],
            'street_address' => ['required', 'string', 'min:3|max:255'],
            'country_region' => ['required', 'string', 'min:3|max:255'],
            'contact_number' => ['required', 'string', 'min:11'],
            'city' => ['required', 'string', 'min:3|max:255'],
            'state_province' => ['required', 'string', 'min:3|max:255'],
            'postal' => ['required', 'numeric', 'min:4'],
            'email_address' => ['required', 'string', 'email', 'max:255'],
            'productId' => ['required', 'numeric']
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
            'email_address' => $request->email_address,
            'productId' => $request->productId
        );

        $errors = $validator->errors();

        $token = $request->bearerToken();
        $validateTOKEN = Hash::check( $this->secret, $token);

        if(!$validateTOKEN){
            $response = "Unauthorized";
            $statusCode = 401;
        }else{
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

        // if($request->type === $typeVariable['email']){

        //     $emailstatus = DB::select('select verified from users where id = ?', [$request->id]);
        //     $emailstatus = $emailstatus[0]->verified;
        //     $sample = array(
        //         "id"=> $request->id,
        //         "email"=> $request->data
        //     );
        //     $validator = Validator::make($sample, [
        //         'id' => ['required', 'numeric'],
        //         'email' => ['required', 'email', 'unique:users']
        //     ]);
        // }else{
        //     $validator = Validator::make($request->all(), [
        //         'id' => ['required', 'numeric'],
        //         'data' => ['required']
        //     ]);
        // }
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'numeric'],
            'data' => ['required']
        ]);

        $token = $request->bearerToken();
        $validateTOKEN = Hash::check( $this->secret, $token);

        if(!$validateTOKEN){
            $response = "Unauthorized";
            $statusCode = 401;
        }else{
            if(!$validator->fails()){
                $statusCode = 200;
                $response = true;
                switch ($request->type) {
                    case $typeVariable['first_name']:
                        $affected = User::where('id', $request->id)
                                            ->update(['first_name' => $request->data]);
                        break;
                    case $typeVariable['last_name']:
                        $affected = User::where('id', $request->id)
                                            ->update(['last_name' => $request->data]);
                        break;
                    case $typeVariable['middle_name']:
                        $affected = User::where('id', $request->id)
                                            ->update(['middle_name' => $request->data]);
                        break;
                    case $typeVariable['home_address']:
                        $affected = User::where('id', $request->id)
                                            ->update(['home_address' => $request->data]);
                        break;
                    case $typeVariable['street_address']:
                        $affected = User::where('id', $request->id)
                                            ->update(['street_address' => $request->data]);
                        break;
                    case $typeVariable['country_region']:
                        $affected = User::where('id', $request->id)
                                            ->update(['country_region' => $request->data]);
                        break;
                    case $typeVariable['contact_number']:
                        $affected = User::where('id', $request->id)
                                            ->update(['contact_number' => $request->data]);
                        break;
                    case $typeVariable['city']:
                        $affected = User::where('id', $request->id)
                                            ->update(['city' => $request->data]);
                        break;
                    case $typeVariable['state_province']:
                        $affected = User::where('id', $request->id)
                                            ->update(['state_province' => $request->data]);
                        break;
                    case $typeVariable['postal']:
                        $affected = User::where('id', $request->id)
                                            ->update(['postal' => $request->data]);
                        break;
                    case $typeVariable['email']:
                        // if($emailstatus === 1){
                        //     $response = false;
                        //     $statusCode = 200;
                        // }else{
                        //     User::where('id', $request->id)
                        //                 ->update(['email' => $request->data]);
                        // }
                        User::where('id', $request->id)
                                        ->update(['email' => $request->data]);
                        break;
                    case $typeVariable['password']:
                        $affected = User::where('id', $request->id)
                                            ->update(['password' => $request->data]);
                        break;
                }
           }else{
                $response = false;
                $statusCode = 200;
           }
        }
        return response()->json($response , $statusCode, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}





