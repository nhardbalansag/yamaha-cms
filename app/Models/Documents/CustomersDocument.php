<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomersDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_path',
        'customer_id',
        'document_id',
        'status'
    ];

}
