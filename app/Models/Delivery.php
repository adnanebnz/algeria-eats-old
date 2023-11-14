<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'deliveryMan_id',
        'order_id',
        'is_accepted',
    ];


    public function deliveryMan()
    {
        return $this->belongsTo(DeliveryMan::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
