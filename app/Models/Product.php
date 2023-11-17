<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory, MediaAlly;

    protected $fillable = [
        'nom',
        'artisan_id',
        'description',
        'categorie',
        'sous_categorie',
        'prix',
        'rating',
        'images'
    ];

    protected $casts = [
        'images' => 'array'
    ];
    public function artisan(): BelongsTo
    {
        return $this->belongsTo(Artisan::class, 'artisan_id', 'user_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function scopeFilters(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? null, function (Builder $query, $search) {
            $query->where(function (Builder $query) use ($search) {
                $query->where('nom', 'LIKE', '%' . $search . '%');
            });
        });

        $query->when($filters['artisan'] ?? null, function (Builder $query, $artisan) {
            $query->whereHas('artisan', function (Builder $query) use ($artisan) {
                $query->whereHas('user', function (Builder $query) use ($artisan) {
                    $query->where('nom', 'LIKE', '%' . $artisan . '%');
                });
            });
        });

        $query->when($filters['artisanRating'] ?? null, function (Builder $query, $artisanRating) {
            $query->whereHas('artisan', function (Builder $query) use ($artisanRating) {
                $query->where('rating', 'LIKE', '%' . $artisanRating . '%');
            });
        });

        $query->when($filters['productRating'] ?? null, function (Builder $query, $productRating) {
            $query->where('rating', 'LIKE', '%' . $productRating . '%');
        });

        $query->when($filters['productType'] ?? null, function (Builder $query, $productType) {
            $query->where('categorie', 'LIKE', '%' . $productType . '%');
        });
    }
}
