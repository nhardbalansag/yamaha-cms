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
        $data['applicants'] = DB::table('users')
                            ->join('customers_documents', 'users.id', '=', 'customers_documents.customer_id')
                            ->select('users.*')
                            ->groupBy('users.id', 'users.first_name')
                            ->paginate(5);

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

}
