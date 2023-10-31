<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'user_id',
        'description',
        'categorie',
        'prix',
        'images'
    ];

    protected $casts = [
        'images' => 'array'
    ];
}
