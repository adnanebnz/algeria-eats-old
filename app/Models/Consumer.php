<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Consumer extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
        // TODO TO CREATE

    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
        // TODO TO CREATE

    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
        // TODO TO CREATE

    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
        // TODO TO CREATE
    }
}
