<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

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
        return $this->belongsTo(Artisan::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
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
