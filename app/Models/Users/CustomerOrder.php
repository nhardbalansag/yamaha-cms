<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'home_address', 
        'contact_number',
        'status',
        'customerId',
        'payment_method',
        'product_price',
        'productId',
        'postal'
    ];

}
