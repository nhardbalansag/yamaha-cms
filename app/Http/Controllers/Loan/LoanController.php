<?php

namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Customer\DocumentController;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['applicants'] = DB::select('SELECT
                                                users.id as id,
                                                users.first_name as first_name,
                                                users.verified as verified,
                                                users.role as role,
                                                users.email as email
                                            FROM users, customers_documents
                                            WHERE (users.id = customers_documents.customer_id)
                                            GROUP BY
                                                users.id,
                                                users.first_name,
                                                users.verified,
                                                users.role,
                                                users.email
                                                ');

        return view('pages.admin.loan.view-all-applicants.index', $data);
    }

    public function viewCustomerDocument($id){

        $data['documents'] = DB::select('SELECT
                                                customers_documents.photo_path as photo_path,
                                                customers_documents.customer_id as customer_id,
                                                customers_documents.status as status,
                                                document_categories.title as title,
                                                customers_documents.id as id,
                                                customers_documents.customer_id as customer_id

                                            FROM customers_documents, document_categories
                                            WHERE  (document_categories.id = customers_documents.document_id) and customers_documents.customer_id = ' . $id .'
                                            GROUP BY
                                                id, photo_path, customer_id, status, title
                                                ');
        return view('pages.admin.loan.view-one-applicant-document.index', $data);
    }

    public function approved($id, $customer_id){

        $affected = DB::table('customers_documents')
                            ->where('id', $id)
                            ->update(['status' => "approved"]);


        $data['documents'] = DB::select('SELECT
                                                customers_documents.photo_path as photo_path,
                                                customers_documents.customer_id as customer_id,
                                                customers_documents.status as status,
                                                document_categories.title as title,
                                                customers_documents.id as id

                                            FROM customers_documents, document_categories
                                            WHERE  (document_categories.id = customers_documents.document_id) and customers_documents.customer_id = ' . $customer_id .'
                                            GROUP BY
                                                id, photo_path, customer_id, status, title
                                                ');

        return view('pages.admin.loan.view-one-applicant-document.index', $data);
    }

    public function declined($id, $customer_id){

        $affected = DB::table('customers_documents')
                            ->where('id', $id)
                            ->update(['status' => "decline"]);


        $data['documents'] = DB::select('SELECT
                                                customers_documents.photo_path as photo_path,
                                                customers_documents.customer_id as customer_id,
                                                customers_documents.status as status,
                                                document_categories.title as title,
                                                customers_documents.id as id

                                            FROM customers_documents, document_categories
                                            WHERE  (document_categories.id = customers_documents.document_id) and customers_documents.customer_id = ' . $customer_id .'
                                            GROUP BY
                                                id, photo_path, customer_id, status, title
                                                ');

        return view('pages.admin.loan.view-one-applicant-document.index', $data);
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
