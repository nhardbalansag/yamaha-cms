<?php

namespace App\Models\Admin\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificationCategory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 
        'description',
        'status',
        'update_count'
    ];

  
}
