<?php

namespace App\Http\Controllers\Admin\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function sendOrderStatusDeliver($id){

        $data['data'] = DB::table('transactions')
                    ->join('users', 'users.id', '=', 'transactions.customerId')
                    ->join('products', 'products.id', '=', 'transactions.productId')
                    ->select('products.*', 'users.first_name')
                    ->where('transactions.id', $id)
                    ->first();

        return view('Mail.OrderNotification.index', $data);
    }
}
