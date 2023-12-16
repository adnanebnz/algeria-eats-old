<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Consumer
 *
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cart|null $cart
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\User $user
 *
 * @method static \Database\Factories\ConsumerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Consumer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Consumer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Consumer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Consumer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consumer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consumer whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Consumer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['user_id'];

    protected $primaryKey = 'user_id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
