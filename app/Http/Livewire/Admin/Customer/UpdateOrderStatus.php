<?php

namespace App\Http\Livewire\Admin\Customer;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Mail;

class UpdateOrderStatus extends Component
{

    public $transactionId, $transactionStatus;

    public function render()
    {
       return view('livewire.admin.customer.update-order-status');
    }

    public function updateOrderStatus()
    {

        $affected = DB::table('transactions')
                    ->where('id', $this->transactionId)
                    ->update(['status' => $this->transactionStatus === "processing" ? 'deliver' : 'done']);

        $data['data'] = DB::table('transactions')
                    ->join('users', 'users.id', '=', 'transactions.customerId')
                    ->join('products', 'products.id', '=', 'transactions.productId')
                    ->select('products.*', 'users.first_name', 'users.email')
                    ->where('transactions.id', $this->transactionId)
                    ->first();
        $email = [
            "first_name" =>  $data['data']->first_name,
            "product_details" =>   $data['data'],
            "email" =>   $data['data']->email
        ];

        session()->flash('message', 'status updated');

        if($this ->transactionStatus === 'processing'){
            Mail::send(new \App\Mail\SendInquiry('deliver', $email));
        }

        return redirect()->to('/orders/viewallOrders/transactions');

    }
}
