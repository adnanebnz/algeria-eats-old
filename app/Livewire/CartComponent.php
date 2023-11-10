<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartComponent extends Component
{

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('product.index');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
