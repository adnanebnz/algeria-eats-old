<?php

namespace App\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class ProductComponent extends Component
{
    use WithPagination;


    public function store(int $id, string $nom, int $prix)
    {
        Cart::add($id, $nom, 1, $prix)->associate('App\Models\Product');
        return redirect()->route('product.index');
    }
    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.product-component', [
            "products" => $products
        ]);
    }
}
