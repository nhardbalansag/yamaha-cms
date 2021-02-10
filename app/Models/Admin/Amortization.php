<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amortization extends Model
{
    use HasFactory;


    protected $fillable = [
        'productId',
        'month',
        'montly_amortization_price'
    ];
}
