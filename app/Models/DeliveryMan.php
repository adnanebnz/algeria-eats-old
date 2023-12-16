<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\DeliveryMan
 *
 * @property int $user_id
 * @property int $est_disponible
 * @property int $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Delivery> $deliveries
 * @property-read int|null $deliveries_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserReview> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\User $user
 *
 * @method static \Database\Factories\DeliveryManFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereEstDisponible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereUserId($value)
 *
 * @mixin \Eloquent
 */
class DeliveryMan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'user_id';

    protected $fillable = ['est_disponible', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    public function reviews()
    {
        return $this->hasMany(UserReview::class, 'user_id');
    }
}
