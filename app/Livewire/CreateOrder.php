<?php

namespace App\Livewire;

use AnouarTouati\AlgerianCitiesLaravel\Facades\AlgerianCitiesFacade;
use App\Jobs\GenerateInvoiceAndSendMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class CreateOrder extends Component
{
    public $adresse;
    public $wilaya_name_ascii;
    public $cartItems;

    protected $rules = [
        'adresse' => 'required',
        'wilaya_name_ascii' => 'required',
    ];

    public function render()
    {
        $wilayas = AlgerianCitiesFacade::getAllWilayas();
        $total = 0;
        $this->cartItems = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->cartItems as $cartItem) {
            $total += $cartItem->product->prix * $cartItem->quantity;
        }

        return view('livewire.create-order', [
            'wilayas' => $wilayas,
            'total' => $total,
        ]);
    }

    public function store()
    {
        $data = $this->validate();
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();
        // TODO CHANGE THIS TO BUYER ID AND SAME TO THE DATABASE SCHEMA AND RELATIONSHIPS
        $order = Order::create([
            'consumer_id' => auth()->user()->id,
            'artisan_id' => $cartItems[0]->product->artisan->user_id,
            'adresse' => $data['adresse'],
            'wilaya' => $data['wilaya_name_ascii'],
            'num_telephone' => auth()->user()->num_telephone,
            'email' => auth()->user()->email,
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
        // generating PDF for invoice and sending it via mail
        GenerateInvoiceAndSendMail::dispatch($order);

        // TODO SHOW THIS IN ARTISAN DASHBOARD AND DELIVERYMAN DASHBOARD

        Alert::success('Succès', 'Votre commande a été enregistrée avec succès');
        return redirect()->route('index');
    }

    public function cancel()
    {
        Alert::error('Erreur', 'Votre commande a été annulée');
        return redirect()->route('index');
    }
}
