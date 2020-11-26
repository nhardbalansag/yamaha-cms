<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function payment(){
        return view('pages.client.pages.payment');
    }

    public function reservation(){
        return view('pages.client.pages.reservation');
    }
}
