<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductComponent extends Component
{
    use WithPagination;

    public function store(int $id)
    {
        Cart::create([
            'product_id' => $id,
            'user_id' => auth()->user()->id,
            'quantity' => 1
        ]);
        $this->dispatch('cartAddedUpdated');
    }
    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.product-component', [
            "products" => $products
        ]);
    }
}
