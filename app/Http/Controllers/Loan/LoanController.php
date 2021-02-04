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
                ->where('customer_id', $id)
                ->count();

        if(!$count){
            abort(404);
        }

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

        $data['documents'] = DB::table('customers_documents')
                            ->join('document_categories', 'customers_documents.document_id', 'document_categories.id')
                            ->select('customers_documents.*', 'document_categories.title as document_title')
                            ->where('customers_documents.customer_id', $id)
                            ->get();

        return view('pages.admin.loan.view-one-applicant-document.index', $data);
    }

}
