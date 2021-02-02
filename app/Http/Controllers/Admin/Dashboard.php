<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Products\Product;
use App\Models\Admin\Products\ProductCategory;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['type'] = 'bar';

        $data['products'] = DB::select('
            SELECT
                product_categories.title as categoryTitle,
                products.id as products_id,
                products.photo_path as products_photo_path,
                products.title as products_title,
                products.description as products_description,
                products.status as products_status,
                products.price as products_price,
                products.created_at as products_created_at

            FROM products, product_categories
            WHERE products.product_category_id = product_categories.id
            LIMIT 0,10');


            $data['inquiries'] = DB::select('SELECT MONTH(created_at) month , YEAR(CURDATE()) year, COUNT(*) inquiries
                                            FROM inquiries
                                            WHERE YEAR(created_at) = YEAR(CURDATE())
                                            GROUP BY MONTH(created_at)' );

            $month = array();
            $values = array();
            $year = array();

            for($i = 0; $i < count($data['inquiries']); $i++){
                array_push($month, $data['inquiries'][$i]->month);
                array_push($values, $data['inquiries'][$i]->inquiries);
                array_push($year, $data['inquiries'][$i]->year);
            }

            $data['inquiries_month'] = $month;
            $data['inquiries_values'] = $values;
            $data['inquiries_year'] = $year;


            unset($month);
            unset($values);
            unset($year);

            //end inquiries
            $data['reserve'] = DB::select('SELECT MONTH(created_at) month , YEAR(CURDATE()) year, COUNT(*) reserve
                                            FROM reservations
                                            WHERE YEAR(created_at) = YEAR(CURDATE())
                                            GROUP BY MONTH(created_at)' );

            $month = array();
            $values = array();
            $year = array();

            for($i = 0; $i < count($data['reserve']); $i++){
                array_push($month, $data['reserve'][$i]->month);
                array_push($values, $data['reserve'][$i]->reserve);
                array_push($year, $data['reserve'][$i]->year);
            }

            $data['reserve_month'] = $month;
            $data['reserve_values'] = $values;
            $data['reserve_year'] = $year;

            unset($month);
            unset($values);
            unset($year);

            //end reserve
            $data['order'] = DB::select('SELECT MONTH(created_at) month , YEAR(CURDATE()) year, COUNT(*) ordervalue
                                            FROM transactions
                                            WHERE YEAR(created_at) = YEAR(CURDATE())
                                            GROUP BY MONTH(created_at)' );

            $month = array();
            $values = array();
            $year = array();

            for($i = 0; $i < count($data['order']); $i++){
                array_push($month, $data['order'][$i]->month);
                array_push($values, $data['order'][$i]->ordervalue);
                array_push($year, $data['order'][$i]->year);
            }

            $data['order_month'] = $month;
            $data['order_values'] = $values;
            $data['order_year'] = $year;

            unset($month);
            unset($values);
            unset($year);
            //end orders

            $data['not_verified'] = DB::select('SELECT COUNT(*) as not_verified
                                                    FROM users
                                                    WHERE verified =  0' );

             $data['verified'] = DB::select('SELECT COUNT(*) as verified
                                                    FROM users
                                                    WHERE verified =  1' );

            $data['customerStatus'] = array($data['not_verified'][0]->not_verified, $data['verified'][0]->verified);


            $data['pending'] = DB::select('SELECT COUNT(*) as pending
                                                FROM products
                                                WHERE status =  "pending"' );

            $data['publish'] = DB::select('SELECT COUNT(*) as publish
                                            FROM products
                                            WHERE status =  "publish"' );

            $data['productStatus'] = array($data['pending'][0]->pending, $data['publish'][0]->publish);

            $data['totalInquiries'] = DB::table('inquiries')
                                ->select(DB::raw('count(*) as inquiries_count'))
                                ->first();

            $data['totalOrders'] = DB::table('transactions')
                                ->select(DB::raw('count(*) as transaction_count'))
                                ->first();

            $data['totalUsers'] = DB::table('users')
                                ->select(DB::raw('count(*) as users_count'))
                                ->first();

            $data['totalProducts'] = DB::table('products')
                                ->select(DB::raw('count(*) as product_count'))
                                ->first();

        return view('pages.admin.dashboard.index', $data);
    }

}
