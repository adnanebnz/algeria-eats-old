<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int $artisan_id
 * @property string $nom
 * @property string $description
 * @property string $categorie
 * @property string $sous_categorie
 * @property int $prix
 * @property array $images
 * @property int|null $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Artisan $artisan
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 *
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static Builder|Product filters(array $filters)
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereArtisanId($value)
 * @method static Builder|Product whereCategorie($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereImages($value)
 * @method static Builder|Product whereNom($value)
 * @method static Builder|Product wherePrix($value)
 * @method static Builder|Product whereRating($value)
 * @method static Builder|Product whereSousCategorie($value)
 * @method static Builder|Product whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'artisan_id',
        'description',
        'categorie',
        'sous_categorie',
        'prix',
        'rating',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function artisan(): BelongsTo
    {
        return $this->belongsTo(Artisan::class, 'artisan_id', 'user_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeFilters(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? null, function (
            Builder $query,
            $search
        ) {
            $query->where(function (Builder $query) use ($search) {
                $query->where('nom', 'LIKE', '%'.$search.'%');
            });
        });

        $query->when($filters['artisan'] ?? null, function (
            Builder $query,
            $artisan
        ) {
            $query->whereHas('artisan', function (Builder $query) use (
                $artisan
            ) {
                $query->whereHas('user', function (Builder $query) use (
                    $artisan
                ) {
                    $query->where(function (Builder $query) use ($artisan) {
                        $query
                            ->where('nom', 'LIKE', '%'.$artisan.'%')
                            ->orWhere('prenom', 'LIKE', '%'.$artisan.'%')
                            ->orWhereRaw(
                                "CONCAT(nom, ' ', prenom) LIKE ?",
                                '%'.$artisan.'%'
                            );
                    });
                });
            });
        });

        $query->when($filters['artisanRating'] ?? null, function (
            Builder $query,
            $artisanRating
        ) {
            $query->whereHas('artisan', function (Builder $query) use (
                $artisanRating
            ) {
                $query->where('rating', 'LIKE', '%'.$artisanRating.'%');
            });
        });

        $query->when($filters['productRating'] ?? null, function (
            Builder $query,
            $productRating
        ) {
            $query->where('rating', 'LIKE', '%'.$productRating.'%');
        });

        $query->when($filters['productType'] ?? null, function (
            Builder $query,
            $productType
        ) {
            $query->where('categorie', 'LIKE', '%'.$productType.'%');
        });
    }
}
