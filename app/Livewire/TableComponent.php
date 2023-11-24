<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class TableComponent extends Component
{
    public $product;
    use WithPagination;

    public function render()
    {
        $product = $this->product;
        $orders = Order::whereHas('orderItems', function ($query) use ($product) {
            $query->where('product_id', $product->id);
        })->paginate(5);

        return view('livewire.table-component', [
            "orders" => $orders,
            "product" => $product
        ]);
    }
}
