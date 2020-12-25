<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerAPIController extends Controller
{
    private $secret = 'capstoneProject2020-2021';

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
            'email' => ['required', 'string', 'min:3|max:50'],
            'password' => ['required', 'string', 'min:5|max:255']
        ]);

        $errors = $validator->errors();

        if(!$validator->fails()){

            $data['data'] = DB::select('SELECT *
                                            FROM users
                                            WHERE email = ' . '"' .$request->email .'"');

            if(!empty($data['data'])){
                $enteredPassword = $request->password;
                $DBpassword = $data['data'][0]->password;
                $DBemail = $data['data'][0]->email;
                $enteredEmail = $request->email;

                $password = Hash::check($enteredPassword, $DBpassword);
                $token = Hash::make($this->secret);

                if($password && $enteredEmail === $DBemail){
                    $response = array(
                        "userInformation" => $data['data'],
                        "token" =>  $token
                    );
                }else{
                    $response = "no matching records";
                }
            }else{
                $response = "no matching records";
            }

        }else{
            $response = array(
                'email' => $errors->first('email'),
                'password' => $errors->first('password')
            );
        }

        return response()->json($response, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}





