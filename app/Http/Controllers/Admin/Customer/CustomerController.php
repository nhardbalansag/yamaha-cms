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

        $data['notVerified'] = DB::table('users')
                            ->where('verified', 0)
                            ->paginate(10);

        return view('pages.admin.customer.not-verified', $data);
    }


    public function verified(){

        $data['verified'] = DB::table('users')
                            ->where('verified', 1)
                            ->paginate(10);

        return view('pages.admin.customer.verified', $data);

    }

    public function inquiries(){

        $data['inquiries'] = DB::table('inquiries')
                            ->paginate(10);

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

        $data['transactions'] = DB::table('transactions')
                    ->join('products', 'products.id', '=', 'transactions.productId')
                    ->join('users', 'users.id', '=', 'transactions.customerId')
                    ->select('transactions.*', 'users.first_name', 'products.title')
                    ->paginate(10);

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

    public function activeTransaction(){

        $data['transactions'] = DB::table('transactions')
                    ->join('products', 'products.id', '=', 'transactions.productId')
                    ->join('users', 'users.id', '=', 'transactions.customerId')
                    ->where('transactions.status', 'processing')
                    ->select('transactions.*', 'users.first_name', 'products.title')
                    ->paginate(10);

        return view('pages.admin.customer.view-all-active-orders', $data);
    }

    public function doneTransaction(){

        $data['transactions'] = DB::table('transactions')
                    ->join('products', 'products.id', '=', 'transactions.productId')
                    ->join('users', 'users.id', '=', 'transactions.customerId')
                    ->where('transactions.status', 'done')
                    ->select('transactions.*', 'users.first_name', 'products.title')
                    ->paginate(10);

        return view('pages.admin.customer.view-all-active-orders', $data);
    }

    public function viewAllreservations(){

        $data['reservations'] = DB::table('service_reservations')
                    ->join('users', 'users.id', '=', 'service_reservations.customerId')
                    ->select('service_reservations.*', 'users.first_name', 'users.email')
                    ->paginate(10);

        return view('pages.admin.customer.view-all-reservations', $data);
    }

}
