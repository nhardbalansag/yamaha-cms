<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Carbon\Carbon;
use PDO;

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

        $data['transactions'] = DB::select('SELECT *
                                            FROM transactions');

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

        $data['transationDate'] = Carbon::parse($data['transactions'][0]->created_at)->format('l jS \\of F Y h:i:s A');

        return view('pages.admin.customer.viewoneTransaction', $data);

    }

    public function createPdf($id)
    {
        $data['transactions'] = DB::select('SELECT *
                                FROM transactions
                                WHERE id = ' . $id);

        $data['users'] = DB::select('SELECT *
                    FROM users
                    WHERE id = ' . $data['transactions'][0]->customerId);

        $data['products'] = DB::select('SELECT *
                FROM products
                WHERE id = ' . $data['transactions'][0]->productId);

        $data['transationDate'] = Carbon::parse($data['transactions'][0]->created_at)->format('l jS \\of F Y h:i:s A');

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $html = view('pages.admin.customer.invoice-pdf', $data);
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream( $data['users'][0]->first_name ."-". $data['transactions'][0]->id . ".pdf");
    }

}
