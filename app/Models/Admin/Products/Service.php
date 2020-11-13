<?php

namespace App\Models\Admin\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_path', 
        'title', 
        'description',
        'status',
        'update_count',
        'price',
        'service_categories_id'
    ];

}
