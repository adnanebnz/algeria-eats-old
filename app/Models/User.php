<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'num_telephone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function consumer()
    {
        return $this->hasOne(Consumer::class);
    }

    public function deliveryMan()
    {
        return $this->hasOne(DeliveryMan::class);
    }

    public function artisan()
    {
        return $this->hasOne(Artisan::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getRatingAttribute($rating): string
    {
        return $rating . '%';
    }

    public function getFullNameAttribute(): string
    {
        return $this->nom . ' ' . $this->prenom;
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->admin()->exists();
    }

    public function getIsDeliveryManAttribute(): bool
    {
        return $this->deliveryMan()->exists();
    }

    public function getIsConsumerAttribute(): bool
    {
        return $this->consumer()->exists();
    }

    public function getIsArtisanAttribute(): bool
    {
        return $this->artisan()->exists();
    }
}
