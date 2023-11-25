<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class SingleProduct extends Component
{
    public $product;
    public $quantity = 1;
    public $feedbackMessage;
    public $feedbackMessageType;
    public $isInWishlist = false;


    public function mount(Product $product)
    {
        if (Auth::check()) {

            $this->isInWishlist = Wishlist::where('product_id', $product->id)
                ->where('user_id', auth()->user()->id)
                ->exists();
        }
        $this->product = $product;
    }

    public function updatedQuantity($value)
    {
        // Ensure the quantity is a positive integer
        $this->quantity = max(1, intval($value));
    }


    public function incrementQuantity()
    {
        $this->quantity++;
    }


    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        if (Auth::check()) {
            if (Cart::where('product_id', $this->product->id)->where('user_id', auth()->user()->id)->exists()) {
                $this->feedbackMessage = 'Produit déja dans le panier';
                $this->feedbackMessageType = 'error';
                $product = $this->product;
                Alert::error('Erreur', 'Produit déja dans le panier');
                return redirect()->route('product.show', $product);
            } else {
                Cart::create([
                    'product_id' => $this->product->id,
                    'user_id' => auth()->user()->id,
                    'quantity' => $this->quantity,
                ]);
                $this->dispatch('cartAddedUpdated');
                $this->quantity = 1;
                $this->feedbackMessage = 'Produit ajouté au panier';
                $this->feedbackMessageType = 'success';
                $product = $this->product;
                Alert::success('Success', 'Produit ajouté au panier');
                return redirect()->route('product.show', $product);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function addToWishlist()
    {
        if (Auth::check()) {
            if (Wishlist::where('product_id', $this->product->id)
                ->where('user_id', auth()->user()->id)
                ->exists()
            ) {
                // REMOVE FROM WISHLIST
                Wishlist::where('product_id', $this->product->id)
                    ->where('user_id', auth()->user()->id)
                    ->delete();
                $this->feedbackMessage = 'Produit retiré de la liste de souhaits';
                $this->feedbackMessageType = 'info';
                $this->dispatch('wishlistAddedUpdated');
                $product = $this->product;
                Alert::info('Info', 'Produit retiré de la liste de souhaits');
                return redirect()->route('product.show', $product);
            } else {
                // Add the product to the user's wishlist
                Wishlist::create([
                    'product_id' => $this->product->id,
                    'user_id' => auth()->user()->id,
                ]);
                $this->feedbackMessage = 'Produit ajouté à la liste de souhaits';
                $this->feedbackMessageType = 'success';
                $this->dispatch('wishlistAddedUpdated');
                $product = $this->product;
                Alert::success('Success', 'Produit ajouté à la liste de souhaits');
                return redirect()->route('product.show', $product);
            }
        } else {
            return redirect()->route('login');
        }
    }

    #[On('closeFeedbackMessage')]

    public function closeFeedbackMessage()
    {
        $this->feedbackMessage = '';
        $this->feedbackMessageType = '';
    }

    #[On('wishlistAddedUpdated')]
    public function wishlistAddedUpdated()
    {
        if (Auth::check()) {
            $this->isInWishlist = Wishlist::where('product_id', $this->product->id)
                ->where('user_id', auth()->user()->id)
                ->exists();
        }
    }

    public function render()
    {
        return view('livewire.single-product');
    }
}
