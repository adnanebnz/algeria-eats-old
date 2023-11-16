<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

use function Livewire\store;

class ProductComponent extends Component
{
    use WithPagination;


    public function store(int $id)
    {
        if (Auth::check()) {
            if (Cart::where('product_id', $id)->where('user_id', auth()->user()->id)->exists()) {
                Alert::toast('Product already in cart', 'warning');
                // TODO TOAST NOT WORKING
            } else {
                Cart::create([
                    'product_id' => $id,
                    'user_id' => auth()->user()->id,
                    'quantity' => 1
                ]);
                $this->dispatch('cartAddedUpdated');
            }
        } else {
            return redirect()->route('login');
        }
    }
    public function render()
    {
        $products = Product::paginate(15);
        return view('livewire.product-component', [
            "products" => $products
        ]);
    }
}
