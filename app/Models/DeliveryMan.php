<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'est_disponible',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRatingAttribute($rating): string
    {
        return $rating . '%';
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
        // TODO TO CREATE
    }
}
