<?php

namespace App\Http\Controllers;

use AnouarTouati\AlgerianCitiesLaravel\Facades\AlgerianCitiesFacade;
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
        $total = 0;
        $wilayas = AlgerianCitiesFacade::getAllWilayas();
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($cartItems as $cartItem) {
            $total += $cartItem->product->prix * $cartItem->quantity;
        }

        return view('cart.checkout', compact('wilayas', 'total', 'cartItems'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'num_telephone' => 'required|numeric',
            'adresse' => 'required',
            'wilaya_name_ascii' => 'required',
        ]);

        $cartItems = Cart::where('user_id', auth()->user()->id)->get();

        foreach ($cartItems as $cartItem) {
            $data['artisan_id'] = $cartItem->product->artisan_id;
            $data['product_id'] = $cartItem->product_id;
            $data['quantity'] = $cartItem->quantity;
            $data['total'] = $cartItem->product->prix * $cartItem->quantity;

            Order::create([
                'consumer_id' => auth()->user()->id,
                'status' => 'pending',
                'artisan_id' => $data['artisan_id'],
                'product_id' => $data['product_id'],
                'prix_total' => $data['total'],
                'quantity' => $data['quantity'],
                'wilaya' => $data['wilaya_name_ascii'],
                'email' => $data['email'],
                'num_telephone' => $data['num_telephone'],
                'adresse' => $data['adresse'],
            ]);
            // DELETE CART ITEMS
            $cartItem->delete();
        }
        Alert::success('Succès', 'Votre commande a été enregistrée avec succès');
        return redirect()->route('index');
        // TODO CREATE SUCCESS PAGE
    }

    public function cancel()
    {
        Alert::error('Erreur', 'Votre commande a été annulée');
        return redirect()->route('index');
    }
}
