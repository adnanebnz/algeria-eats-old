<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'desc_entreprise',
        'heure_ouverture',
        'heure_fermeture',
        'rating',
        'type_service'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'user_id');
    }

    public function getRatingAttribute($rating): string
    {
        return $rating . '%';
    }
}
