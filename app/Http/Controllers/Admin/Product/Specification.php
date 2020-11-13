<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Specification extends Controller
{
    public function index(){

        return view('pages.admin.products.create-specification-category.index');

    }

    public function specificationForm(){

        return view('pages.admin.products.specification.index');

    }
}
