<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Artisan
 *
 * @property int $user_id
 * @property string $desc_entreprise
 * @property string $heure_ouverture
 * @property string $heure_fermeture
 * @property int $rating
 * @property string $type_service
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserReview> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\User $user
 *
 * @method static \Database\Factories\ArtisanFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Artisan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artisan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artisan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Artisan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artisan whereDescEntreprise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artisan whereHeureFermeture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artisan whereHeureOuverture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artisan whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artisan whereTypeService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artisan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artisan whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Artisan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'desc_entreprise',
        'heure_ouverture',
        'heure_fermeture',
        'rating',
        'type_service',
    ];

    protected $primaryKey = 'user_id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'artisan_id');
    }

    public function reviews()
    {
        return $this->hasMany(UserReview::class, 'user_id');
    }
}
