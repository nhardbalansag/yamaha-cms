<?php

namespace App\Http\Livewire\Home;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Products\Product;

use Livewire\Component;

class NavigationSearch extends Component
{

    public $productCategory="", $sortBy="", $topSearch = "";

    public $dataCategory = [ 'topSearch' => 'required'];

    public function render()
    {

        $data['category'] = DB::select('
                                SELECT *
                                FROM product_categories
                                WHERE status = "publish"
                            ');
        $data['recommended'] = Product::where('status', 'publish')->get();

        if(empty($this->topSearch)){

            $data['product'] = DB::select('SELECT *
                                        FROM products
                                        WHERE status = "publish" ');

        }else if(!empty($this->topSearch)){

            $data['product'] = DB::select('SELECT *
                                            FROM products
                                            WHERE status = "publish" AND title LIKE "%'.$this->topSearch.'%" ' );
        }

        if(!empty($this->productCategory)){

            $data['product'] = DB::select('SELECT *
                                        FROM products
                                        WHERE status = "publish" AND product_category_id = ?', [$this->productCategory]);
        }

        if(!empty($this->sortBy) && $this->sortBy === "1"){
            $data['product'] = DB::select('SELECT *
                                        FROM products
                                        WHERE status = "publish" ORDER BY title DESC');
        }else if(!empty($this->sortBy) && $this->sortBy === "2"){
            $data['product'] = DB::select('SELECT *
                                        FROM products
                                        WHERE status = "publish" ORDER BY title ASC');
        }else if(!empty($this->sortBy) && $this->sortBy === "3"){
            $data['product'] = DB::select('SELECT *
                                        FROM products
                                        WHERE status = "publish" ORDER BY price DESC');
        }else if(!empty($this->sortBy) && $this->sortBy === "4"){
            $data['product'] = DB::select('SELECT *
                                        FROM products
                                        WHERE status = "publish" ORDER BY price ASC');
        }

        return view('livewire.home.navigation-search', $data);
    }

}
