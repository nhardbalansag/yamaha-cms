<?php

namespace App\Http\Livewire\Home;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Products\Product;

use Livewire\Component;

class NavigationSearch extends Component
{

    public $productCategory="", $orderBy="", $sortBy ="", $topSearch="";

    public function render()
    {

        $data['category'] = DB::select('
                                SELECT *
                                FROM product_categories
                                WHERE status = "publish"
                            ');
        $data['recommended'] = Product::where('status', 'publish')->get();

        $data['product'] = DB::select('SELECT *
                                        FROM products
                                        WHERE status = "publish" ');

        if(!empty($this->topSearch)){
            $data['product'] = $this->searchProduct();
            $this->topSearch = "";
        }else if(empty($this->topSearch)){
            $data['product'] = $this->sortProduct();
        }

        return view('livewire.home.navigation-search', $data);
    }

    public function sortProduct(){

        if(!empty($this->productCategory) && (!empty($this->orderBy) || !empty($this->sortBy)) ){

            $data = DB::select('SELECT *
                                FROM products
                                WHERE status = "publish" AND product_category_id = '. $this->productCategory .'
                                    ORDER BY ' . $this->sortBy . ' ' . $this->orderBy);

            session()->flash('message', 'Your search returned ' . count($data) . ' item(s)');

        }else{

            $data = DB::select('SELECT *
                                FROM products
                                WHERE status = "publish" ');
        }

        $this->productCategory = "";
        $this->sortBy = "";
        $this->orderBy = "";

        return  $data;
    }

    public function searchProduct(){

        $data = DB::select('SELECT *
                            FROM products
                            WHERE status = "publish" AND title LIKE "%'.$this->topSearch.'%" ' );
        session()->flash('message', 'Your search returned ' . count($data) . ' item(s)');
        return $data;
    }

}
