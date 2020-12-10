<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status'
    ];
}
