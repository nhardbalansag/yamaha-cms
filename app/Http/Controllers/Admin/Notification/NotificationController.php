<?php

namespace App\Http\Controllers\Admin\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function sendOrderStatusDeliver(){
        return view('Mail.Inquiry.index');
    }
}
