<?php

namespace App\Models\Admin\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description',
        'status',
        'update_count',
        'specification_category_id',
        'product_id'
    ];  

}
