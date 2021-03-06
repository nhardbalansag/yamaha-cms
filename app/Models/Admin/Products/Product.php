<?php

namespace App\Models\Admin\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_path',
        'title',
        'description',
        'status',
        'update_count',
        'price',
        'number_available',
        'product_category_id'
    ];

}

