<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartComponent extends Component
{
    public $cartCount;

    protected $listeners = ['cartAddedUpdated' => 'render'];

    public function remove($id)
    {
        Cart::where('product_id', $id)->where('user_id', auth()->user()->id)->delete();
        $this->dispatch('cartAddedUpdated');
    }

    public function render()
    {
        $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
        return view('livewire.cart-component', ['cartCount' => $this->cartCount]);
    }
}
