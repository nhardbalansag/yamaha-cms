<?php

namespace App\Models\Admin\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'update_count'
    ];

    public function products(){
        return $this->hasMany('App\Models\Admin\Products\Product', 'product_category_id');
    }
}
