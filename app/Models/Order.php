<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'consumer_id',
        'artisan_id',
        'product_id',
        'quantity',
        'prix_total',
        'status',
        'adresse',
        'wilaya',
        'num_telephone'
    ];

    public function consumer()
    {
        return $this->belongsTo(User::class, 'consumer_id');
    }

    public function artisan()
    {
        return $this->belongsTo(User::class, 'artisan_id');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
