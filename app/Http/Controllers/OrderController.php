<?php

namespace App\Http\Controllers;

use AnouarTouati\AlgerianCitiesLaravel\Facades\AlgerianCitiesFacade;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\PurchaseMail;
use Illuminate\Support\Facades\Mail;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
    {
        $total = 0;
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($cartItems as $cartItem) {
            $total += $cartItem->product->prix * $cartItem->quantity;
        }

        return view('cart.checkout', compact('total', 'cartItems'));
    }
}
