<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CartComponent extends Component
{
    public $cartCount;

    public function remove($id)
    {
        if (Auth::check()) {
            if (Product::where('id', $id)->exists()) {
                Cart::where('product_id', $id)->where('user_id', auth()->user()->id)->delete();
                $this->dispatch('cartAddedUpdated');
            } else {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
    }


    #[On('cartAddedUpdated')]
    public function updateCart()
    {
        $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
        return $this->render();
    }

    public function render()
    {
        if (Auth::check()) {
            $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
        } else {
            $this->cartCount = 0;
        }
        return view('livewire.cart-component', ['cartCount' => $this->cartCount]);
    }
}
