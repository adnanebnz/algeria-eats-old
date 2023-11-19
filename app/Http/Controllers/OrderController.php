<?php

namespace App\Http\Controllers;

use AnouarTouati\AlgerianCitiesLaravel\Facades\AlgerianCitiesFacade;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
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
        $order = Order::create([
            'consumer_id' => auth()->user()->id,
            'artisan_id' => $cartItems[0]->product->artisan->user_id,
            'adresse' => $data['adresse'],
            'wilaya' => $data['wilaya_name_ascii'],
            'num_telephone' => $data['num_telephone'],
            'status' => 'pending',
        ]);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'prix_total' => $cartItem->product->prix * $cartItem->quantity,
            ]);
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
