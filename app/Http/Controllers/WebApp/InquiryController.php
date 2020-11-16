<?php

namespace App\Http\Controllers\WebApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index(){
        return view('pages.web-app.home.pages.inquiry.index');
    }
}
