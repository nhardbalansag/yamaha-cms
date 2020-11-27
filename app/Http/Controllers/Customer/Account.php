<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Products\Product;
use App\Models\User;

class Account extends Controller
{
    public function index($id){

        $data['account_info'] = DB::select('SELECT * 
                                FROM users
                                WHERE id = ' . $id);
        return view('pages.client.pages.my-account', $data);
    }

    public function loanApplication(){
        return view('pages.client.pages.loan-application');
    }

    public function payment($product_id, $account_id){
        //checkout details
        $accountInfo = User::where('id', $account_id)->first();

        //product details customer want to avail
        $product = Product::where('id', $product_id)->first();

        $data['data'] = array( 
                "account" => $accountInfo, 
                "product" => $product);
         
        //send email when checkout
        return view('pages.client.pages.payment', $data);
    }

    public function reservation(){
        return view('pages.client.pages.reservation');
    }

    public function verify($id){
        
        $affected = DB::table('users')
                    ->where('email', $id)
                    ->update(['verified' => true]);

                    return redirect('/home');
    }

}
