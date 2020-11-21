<?php

namespace App\Http\Controllers\WebApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    public function login(){
        return view('pages.web-app.home.pages.login-register.login');
    }

    public function register(){
        return view('pages.web-app.home.pages.login-register.register');
    }

}
