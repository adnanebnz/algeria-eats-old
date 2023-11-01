<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'user_id',
        'description',
        'categorie',
        'prix',
        'images'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function artisan(): BelongsTo
    {
        return $this->belongsTo(Artisan::class);
    }

    public function getRouteKeyName(): string
    {
        return 'nom';
    }

    public function getImagesAttribute($images): array
    {
        return array_map(function ($image) {
            return asset('storage/' . $image);
        }, json_decode($images, true));
    }

    public function getFeaturedImageAttribute(): string
    {
        return $this->images[0];
    }

    public function getRelatedProductsAttribute(): Collection
    {
        return Product::where('categorie', $this->categorie)
            ->where('id', '!=', $this->id)
            ->take(4)
            ->get();
    }

    public function getCategoriesAttribute(): Collection
    {
        return Product::select('categorie')
            ->distinct()
            ->get()
            ->map(function ($product) {
                return $product->categorie;
            });
    }

    public function getFeaturedProductsAttribute(): Collection
    {
        return Product::inRandomOrder()
            ->take(4)
            ->get();
    }
}
