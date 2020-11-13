<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Color extends Controller
{
    public function index()
    {
        return view('pages.admin.products.color.index');
    }
}
