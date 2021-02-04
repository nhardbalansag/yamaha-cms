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

        $data['passId'] = DB::table('customers_documents')
                        ->where('id', $id)
                        ->where('customer_id', Auth::user()->id)
                        ->first();
        if(!$data['passId']){
            abort(404);
        }

        return view('pages.client.pages.resubmit-document', $data);
    }

}
