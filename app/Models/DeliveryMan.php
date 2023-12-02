<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


class DeliveryMan extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;


    protected $primaryKey = 'user_id';

    protected $fillable = [

        'est_disponible',
        'rating',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
