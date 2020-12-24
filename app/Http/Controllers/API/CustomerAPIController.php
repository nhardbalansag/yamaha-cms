<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CustomerAPIController extends Controller
{
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
       }

        return response()->json($dataresponse, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

    }
}





