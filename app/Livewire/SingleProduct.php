<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SingleProduct extends Component
{
    public $product;
    public $quantity = 1;
    public $feedbackMessage;
    public $feedbackMessageType;


    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addToCart()
    {
        if (Auth::check()) {
            if (Cart::where('product_id', $this->product->id)->where('user_id', auth()->user()->id)->exists()) {
                $this->feedbackMessage = 'Produit déja dans le panier';
                $this->feedbackMessageType = 'error';
            } else {
                Cart::create([
                    'product_id' => $this->product->id,
                    'user_id' => auth()->user()->id,
                    'quantity' => 1
                ]);
                $this->dispatch('cartAddedUpdated');
                $this->quantity = 1;
                $this->feedbackMessage = 'Produit ajouté au panier';
                $this->feedbackMessageType = 'success';
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.single-product');
    }
}
