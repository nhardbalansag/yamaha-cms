<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categoryCount'] = DB::select('SELECT * FROM document_categories');

        $data['passId'] = DB::select('SELECT count(*) as data_count
                                        FROM customers_documents, document_categories
                                        WHERE
                                            customers_documents.document_id = document_categories.id and customers_documents.customer_id = ' . Auth::user()->id);

        $data['pending'] = DB::select('SELECT count(*) as data_count
                                        FROM customers_documents, document_categories
                                        WHERE
                                            (customers_documents.status = "pending")
                                            AND customers_documents.document_id = document_categories.id and customers_documents.customer_id = ' . Auth::user()->id);

        $data['declined'] = DB::select('SELECT count(*) as data_count
                                        FROM customers_documents, document_categories
                                        WHERE
                                            (customers_documents.status = "decline")
                                            AND customers_documents.document_id = document_categories.id and customers_documents.customer_id = ' . Auth::user()->id);

        $data['passingDocs'] = ($data['passId'][0]->data_count / count($data['categoryCount'])) * 100;
        $data['pendingDocs'] = ($data['pending'][0]->data_count / count($data['categoryCount'])) * 100;
        $data['declinedDocs'] = ($data['declined'][0]->data_count / count($data['categoryCount'])) * 100;

        return view('pages.client.pages.set-up-loan-credentials', $data);
    }


    public function resubmit($id){

        $data['passId'] = DB::select('SELECT *
                                        FROM customers_documents
                                        WHERE customers_documents.id = ' . $id . ' and customers_documents.customer_id = ' . Auth::user()->id);
        return view('pages.client.pages.resubmit-document', $data);
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
