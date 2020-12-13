<?php

namespace App\Http\Livewire\Home;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Products\Product;

use Livewire\Component;

class NavigationSearch extends Component
{

    public $productCategory, $orderBy, $sortBy, $topSearch;

    public $data = [
        'productCategory' => 'required|numeric',
        'orderBy' => 'required|max:5',
        'sortBy' => 'required|max:5'
    ];

    public $dataCategory = [ 'topSearch' => 'required'];

    public function render()
    {

        $data['category'] = DB::select('
                                SELECT *
                                FROM product_categories
                                WHERE status = "publish"
                            ');
        $data['recommended'] = Product::where('status', 'publish')->get();
        $data['product'] = Product::where('status', 'publish')->get();


        return view('livewire.home.navigation-search', $data);
    }

    public function searchProduct(){

        $validatedData = $this->validate($this->data);

        $data['product'] = DB::select('SELECT *
                                        FROM products
                                        WHERE status = "publish"
                                        ORDER BY ' . $validatedData['sortBy'] . ' ' . $validatedData['orderBy']);

        return view('livewire.home.navigation-search', $data);
    }

    public function searchCategory(){

        $validatedData = $this->validate($this->dataCategory);

        $data['product'] = DB::select('SELECT *
                                        FROM products
                                        WHERE status = "publish" AND title LIKE ?', [ $validatedData['topSearch']]);

        return view('livewire.home.navigation-search', $data);
    }

}
