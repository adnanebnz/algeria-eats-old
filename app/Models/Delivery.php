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

    public function isAccepted()
    {
        return $this->is_accepted;
    }

    public function accept()
    {
        $this->is_accepted = true;
        $this->save();
    }

    public function reject()
    {
        $this->is_accepted = false;
        $this->save();
    }
}
