<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Products\Product;
use App\Models\User;
use App\Models\Users\Transaction;
use App\Models\Users\AccountVerification;
use Illuminate\Support\Facades\Auth;

class Account extends Controller
{
    public function index($id){

        $data['account_info'] = DB::select('SELECT * 
                                FROM users
                                WHERE id = ' . $id);
        $data['transactionData'] = DB::select('SELECT *, transactions.status as transactionStatus
                                                FROM transactions, users, products
                                                WHERE 
                                                    (users.id = transactions.customerId AND products.id = transactions.productId) AND users.id = ' . Auth::user()->id);
        
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

    public function verify($email){

        $column = ['email'=> $email];

        $results = User::select('email')
                        ->where('email', $email) 
                        ->first();
        
        if(!empty($results)){
            if($results->email === $email ){
                $affected = User::where('email', $email)
                                ->update(['verified' => true]);
            }
            
            return redirect('/home');
        }
        
        return redirect('/customer/register');

    }

    public function checkoutDetails($user_id, $product_id, $amount){


        $data = array(
            'customerId' => $user_id == Auth::user()->id ? Auth::user()->id : abort(403, 'Unauthorized') , 
            'productId' => $product_id, 
            'purchaseAmount' => $amount,
            'status' => "processing"
        );
        
        if(Transaction::create($data)){
            $data['result'] = true;
            return redirect('/my-account/' . Auth::user()->id);
        }else{
            $data['result'] = false;
            return view('pages.client.pages.payment-result', $data);
        }
    }


    public function verifyEmail($id){
        
        $verification = rand(0, 10000);

        $data = [
            'verificationCode' =>  $verification,
            'customerId' => $id
        ];

        if(AccountVerification::create($data)){
            $data['result'] = true;
            return redirect('/my-account/' . Auth::user()->id);
        }else{
            $data['result'] = false;
            return view('pages.client.pages.payment-result', $data);
        }

    }
}

       
        

                       
        