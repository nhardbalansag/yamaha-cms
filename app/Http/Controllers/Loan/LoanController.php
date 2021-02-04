<?php

namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Mail;

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
                            ->select('users.id', 'users.first_name', 'users.verified', 'users.role', 'users.email')
                            ->groupBy('users.id', 'users.first_name', 'users.verified', 'users.role', 'users.email')
                            ->paginate(10);

        return view('pages.admin.loan.view-all-applicants.index', $data);
    }

    public function viewCustomerDocument($id){

        $count  = DB::table('customers_documents')
                ->where('status', 'approved')
                ->where('customer_id', $id)
                ->count();

        // $docsCategoryCouunt  = DB::table('document_categories')
        //                     ->where('status', 'publish')
        //                     ->count();

        // if($count === $docsCategoryCouunt){

        //     $data = DB::table('users')
        //         ->where('id', $id)
        //         ->first();

        //     $email = [
        //         "first_name" =>  $data->first_name,
        //         "information" => $data,
        //         "email" =>   $data->email
        //     ];

        //     Mail::send(new \App\Mail\SendInquiry('verifiedDocument', $email));

        // }

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

}
