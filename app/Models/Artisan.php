<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Artisan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        "user_id",
        "desc_entreprise",
        "heure_ouverture",
        "heure_fermeture",
        "rating",
        "type_service",
    ];

    protected $primaryKey = "user_id";

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function products()
    {
        return $this->hasMany(Product::class, "user_id");
    }

    public function orders()
    {
        return $this->hasMany(Order::class, "artisan_id");
    }

    public function reviews()
    {
        return $this->hasMany(UserReview::class, "user_id");
    }
}
