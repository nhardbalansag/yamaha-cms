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


       if(!$validator->fails()){
            User::create($data);
           $response = true;
       }else{
            $response = false;
       }

        return response()->json($response, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

    }
}





