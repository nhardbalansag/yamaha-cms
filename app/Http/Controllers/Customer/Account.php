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
use Mail;

class Account extends Controller
{

    protected $emailType = "registration";

    public function index(){

        $data['account_info'] = DB::table('users')->where('id', Auth::user()->id)->first();

        $data['transactionData'] = DB::table('products')
        ->join('transactions', 'transactions.productId', '=', 'products.id')
        ->join('users', 'users.id', '=', 'transactions.customerId')
        ->select('products.*', 'transactions.status as transactionStatus', 'transactions.purchaseAmount')
        ->where('users.id',  Auth::user()->id)
        ->paginate(5);

        $data['approval_percent'] = DB::select('SELECT COUNT(*) as data_count
                                                FROM customers_documents
                                                WHERE customers_documents.status = "approved" and customers_documents.customer_id = ' . Auth::user()->id);

        $data['approval_result'] = round(($data['approval_percent'][0]->data_count / 4) * 100);

        return view('pages.client.pages.my-account', $data);
    }

    public function loanApplication(){
        return view('pages.client.pages.loan-application');
    }

    public function payment($product_id, $account_id){
        //checkout details
        $accountInfo = User::where('id', $account_id)->first();

        //product details customer want to avail
        $product = DB::table('products')
                ->where('id', $product_id)
                ->first();

        if(!$product || !$accountInfo){
            abort(404);
        }

        $data['data'] = array(
                "account" => $accountInfo,
                "product" => $product);

        //send email when checkout

        return view('pages.client.pages.payment', $data);
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

            $productInformation = DB::table('products')
                                ->where('id', $product_id)
                                ->first();

            if($productInformation->number_available == 0){

                $affected = DB::table('products')
                        ->where('id', $product_id)
                        ->update(['status' => "pending"]);

            }else{

                $InventoryTotal = ($productInformation->number_available - 1);

                $affected = DB::table('products')
                                ->where('id', $product_id)
                                ->update(['number_available' => $InventoryTotal]);

                if($InventoryTotal == 0 ){
                    $affected = DB::table('products')
                                ->where('id', $product_id)
                                ->update(['status' => "pending"]);
                }
            }

            return redirect()->to('/my-account');

        }else{

            return redirect()->to('/my-account');

        }
    }

    public function verifyEmail(){

        $verification = rand(0, 10000);

        $data = [
            'verificationCode' =>  $verification,
            'customerId' => Auth::user()->id
        ];

        $email = [
            "first_name" => Auth::user()->first_name,
            "last_name" => Auth::user()->last_name,
            "middle_name" => Auth::user()->middle_name,
            "verification" =>  $verification,
            "email" =>  Auth::user()->email
        ];

        if(AccountVerification::create($data)){
            $data['result'] = "We sent verification code to your email. Please check your email to verify your account";
            $data['result_bool'] = true;

            Mail::send(new \App\Mail\SendInquiry($this->emailType, $email));

            return view('pages.client.pages.verify-code', $data);

        }

    }

    public function verifyCode(Request $request){

        $request->validate([
            'verificationCode' => 'required|numeric'
        ]);

        $data['result'] = DB::select('SELECT customerId
                                        FROM account_verifications
                                            WHERE verificationCode = ?', [$request->input()['verificationCode']]);

       if(!empty($data['result'])){
            //update status
            $affected = User::where('id', $data['result'][0]->customerId)
                                ->update(['verified' => true]);

            return redirect('/my-account');

       }else{
            $data['result'] = "verification failed please confirm your email";
            $data['result_bool'] = false;

            return view('pages.client.pages.verify-code', $data);

       }

    }

}





