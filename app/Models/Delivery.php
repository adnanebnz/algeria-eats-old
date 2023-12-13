<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Delivery
 *
 * @property int $id
 * @property int|null $deliveryMan_id
 * @property int $order_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DeliveryMan|null $deliveryMan
 * @property-read \App\Models\Order $order
 * @method static \Database\Factories\DeliveryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereDeliveryManId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Delivery extends Model
{
    use HasFactory;

    protected $fillable = ["deliveryMan_id", "order_id", "status"];

    public function deliveryMan()
    {
        return $this->belongsTo(DeliveryMan::class, "deliveryMan_id");
    }

    public function order()
    {
        return $this->belongsTo(Order::class, "order_id");
    }
}
