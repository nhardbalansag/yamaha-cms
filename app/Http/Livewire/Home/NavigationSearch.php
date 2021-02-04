<?php

namespace App\Http\Livewire\Home;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Products\Product;
use Livewire\WithPagination;
use Livewire\Component;

class NavigationSearch extends Component
{
    use WithPagination;

    public $productCategory, $orderBy, $sortBy, $topSearch;

    public function render()
    {


        $data['category'] = DB::table('product_categories')->where('status', 'publish')->get();

        $data['recommended'] = Product::where('status', 'publish')->get();

        $data['product'] = DB::table('products')
                        ->where('status', 'publish')
                        ->where('product_category_id', 1)
                        ->paginate(10);

        if(!empty($this->topSearch)){
            $data['product'] = $this->searchProduct();
        }else if(empty($this->topSearch)){
            $data['product'] = $this->sortProduct();
        }
        $this->resetPage();
        return view('livewire.home.navigation-search', $data);
    }

    public function sortProduct(){

        if($this->productCategory != "" ){

            $data =  DB::table('products')
                    ->where('status', 'publish')
                    ->where('product_category_id', $this->productCategory)
                    ->orderByRaw(($this->sortBy  ? $this->sortBy : 'title') . ' ' .  ($this->orderBy ? $this->orderBy : 'DESC'))
                    ->paginate(10);

            session()->flash('message', 'Your search returned ' . count($data) . ' item(s)');

        }else{

            $data =  DB::table('products')
                ->where('status', 'publish')
                ->where('product_category_id', 1)
                ->paginate(10);
        }

        return  $data;
    }

    public function searchProduct(){

         $data = DB::table('products')
                ->orWhere('title', 'like', '%' . $this->topSearch . '%')
                ->where('status', 'publish')
                ->paginate(10);

        session()->flash('message', 'Your search returned ' . count($data) . ' item(s)');
        return $data;
    }

}
