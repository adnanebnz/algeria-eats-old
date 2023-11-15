<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
    {
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();
        $total = 0;
        foreach ($cartItems as $cartItem) {
            $total += $cartItem->product->prix * $cartItem->quantity;
        }
        return view('cart.checkout', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'consumer_id' => 'required|integer',
            'artisan_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'prix_total' => 'required|integer',
            'adresse' => 'required|string',
            'phone' => 'required|string',
        ]);

        Order::create($data);
        Alert::success('Succès', 'Votre commande a été enregistrée avec succès');
        return redirect()->route('artisan.index');
        // TODO CREATE SUCCESS PAGE
    }
}
