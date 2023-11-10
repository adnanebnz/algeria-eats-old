<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartComponent extends Component
{
    protected $listeners = ['itemAdded' => 'render', 'itemRemoved' => 'render'];

    public function remove($id)
    {
        Cart::where('product_id', $id)->where('user_id', auth()->user()->id)->delete();
        $this->dispatch('itemRemoved');
    }

    public function render()
    {
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();
        $cartCount = Cart::where('user_id', auth()->user()->id)->count();
        return view('livewire.cart-component', ['cartItems' =>  $cartItems, 'cartCount' => $cartCount]);
    }
}
