<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.customer.index');
    }


    public function viewNotVerified(){

        $data['notVerified'] = DB::select('SELECT *
                                            FROM users
                                            WHERE verified = 0');

        return view('pages.admin.customer.not-verified', $data);
    }


    public function verified(){

        $data['verified'] = DB::select('SELECT *
                                            FROM users
                                            WHERE verified = 1');

        return view('pages.admin.customer.verified', $data);

    }

    public function inquiries(){

        $data['inquiries'] = DB::select('SELECT *
                                            FROM inquiries');

        return view('pages.admin.customer.inquiries', $data);

    }

    public function viewoneInquiry($inquiryID){

        $data['inquiries'] = DB::select('SELECT *
                                            FROM inquiries
                                            WHERE id = ' . $inquiryID);

        $data['productinfo'] = DB::select('SELECT *
                                            FROM products
                                            WHERE id = ' . $data['inquiries'][0]->productId);

        return view('pages.admin.customer.view-one-inquiry', $data);

    }

    public function viewallOrders(){

        $data['transactions'] = DB::select('SELECT
                                            transactions.id as id,
                                            users.first_name as first_name,
                                            products.title as title,
                                            transactions.purchaseAmount as purchaseAmount,
                                            transactions.status as status,
                                            transactions.created_at as created_at
                                            FROM transactions,  users, products
                                            GROUP BY transactions.id, users.first_name, products.title');

        return view('pages.admin.customer.view-all-orders', $data);

    }

    public function viewoneOrderTransaction($id){

        $data['transactions'] = DB::select('SELECT *
                                            FROM transactions
                                            WHERE id = ' . $id);

         $data['users'] = DB::select('SELECT *
                                                FROM users
                                                WHERE id = ' . $data['transactions'][0]->customerId);

        $data['products'] = DB::select('SELECT *
                                            FROM products
                                            WHERE id = ' . $data['transactions'][0]->productId);
        return view('pages.admin.customer.viewoneTransaction', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
