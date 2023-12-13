<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $buyer_id
 * @property int $artisan_id
 * @property string $adresse
 * @property string $wilaya
 * @property string $daira
 * @property string $commune
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $artisan
 * @property-read \App\Models\User $buyer
 * @property-read \App\Models\Delivery|null $delivery
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $orderItems
 * @property-read int|null $order_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereArtisanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCommune($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDaira($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereWilaya($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "buyer_id",
        "artisan_id",
        "status",
        "adresse",
        "wilaya",
        "daira",
        "commune",
    ];

    public function buyer()
    {
        return $this->belongsTo(User::class, "buyer_id");
    }

    public function artisan()
    {
        return $this->belongsTo(User::class, "artisan_id");
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getTotalPrice()
    {
        $total = 0;
        foreach ($this->orderItems as $orderItem) {
            $total += $orderItem->product->prix * $orderItem->quantity;
        }
        return $total;
    }
}
