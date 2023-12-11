<?php

namespace App\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class CartPage extends Component
{
    public $cartItems;
    public $totalPrice;
    public $quantity = 1;

    public function increaseQuantity($productId)
    {
        if (Auth::check()) {
            if (
                Cart::where("product_id", $productId)
                    ->where("user_id", auth()->user()->id)
                    ->exists()
            ) {
                $cart = Cart::where("product_id", $productId)
                    ->where("user_id", auth()->user()->id)
                    ->first();
                $cart->quantity += 1;
                $cart->save();
                $this->dispatch("cartAddedUpdated");
            } else {
                return redirect()->route("login");
            }
        } else {
            return redirect()->route("login");
        }
    }

    public function decreaseQuantity($productId)
    {
        if (Auth::check()) {
            if (
                Cart::where("product_id", $productId)
                    ->where("user_id", auth()->user()->id)
                    ->exists()
            ) {
                $cart = Cart::where("product_id", $productId)
                    ->where("user_id", auth()->user()->id)
                    ->first();
                if ($cart->quantity > 1) {
                    $cart->quantity -= 1;
                }
                $cart->save();
                $this->dispatch("cartAddedUpdated");
            } else {
                return redirect()->route("login");
            }
        } else {
            return redirect()->route("login");
        }
    }
    public function remove($productId)
    {
        if (Auth::check()) {
            if (
                Cart::where("product_id", $productId)
                    ->where("user_id", auth()->user()->id)
                    ->exists()
            ) {
                Cart::where("product_id", $productId)
                    ->where("user_id", auth()->user()->id)
                    ->delete();
                $this->dispatch("cartAddedUpdated");
            } else {
                return redirect()->route("login");
            }
        } else {
            return redirect()->route("login");
        }
    }

    #[On("cartAddedUpdated")]
    public function updateCart()
    {
        $this->cartItems = Cart::where("user_id", auth()->user()->id)->get();
        return $this->render();
    }

    public function render()
    {
        if (Auth::check()) {
            $this->cartItems = Cart::where(
                "user_id",
                auth()->user()->id
            )->get();

            $this->totalPrice = 0;
            foreach ($this->cartItems as $item) {
                $this->totalPrice += $item->product->prix * $item->quantity;
            }
        }
        return view("livewire.cart-page", [
            "cartItems" => $this->cartItems,
            "totalPrice" => $this->totalPrice,
        ]);
    }
}
