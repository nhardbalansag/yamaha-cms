<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email_address',
        'home_address', 
        'street_address',
        'country_region',
        'contact_number',
        'city',
        'state_province',
        'postal',
        'productId'
    ];
}
