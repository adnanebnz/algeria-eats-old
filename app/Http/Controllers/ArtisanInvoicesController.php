<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;

class ArtisanInvoicesController extends Controller
{
    public function create(Order $order)
    {
        $customer = new Buyer([
            'name'          => $order->consumer->getFullName(),
            'custom_fields' => [
                'Adresse' => $order->adresse,
                'Wilaya'  => $order->wilaya,
                'Numéro de Telephone' => $order->num_telephone,
                'Email' => $order->consumer->email,
            ],
        ]);

        $artisan = new Party([
            'name'    => $order->artisan->getFullName(),
            'custom_fields' => [
                'Adresse' => $order->artisan->adresse,
                'Numéro de Telephone' => $order->artisan->num_telephone,
                'Email' => $order->artisan->email,
            ],
        ]);

        $product = Product::find($order->product_id);
        // TODO PROBLEM THIS IS ONLY FOR ONE PRODUCT. WE NEED TO ADD ALL THE PRODUCTS IN THE ORDER WE MODIFY THE DATABASE SCHEMA TO BE JSON OF PRODUCT IDS AND QUANTITIES AND ADD CASTS IN THE MODEL

        $item = InvoiceItem::make($product->nom)
            ->pricePerUnit($order->prix_total / $order->quantity)
            ->quantity($order->quantity);

        $invoice = Invoice::make()
            ->seller($artisan)
            ->buyer($customer)
            ->addItem($item)
            ->serialNumberFormat('FACTURE-{SEQUENCE}')
            ->sequence(1)
            ->dateFormat('d/m/Y')
            ->payUntilDays(7)
            ->currencySymbol('DA')
            ->currencyCode('DZD')
            ->currencyFormat('{VALUE} {SYMBOL}')
            ->logo(public_path('assets\LOGO.png'))
            ->filename('invoice_' . $order->id . '_' . $order->consumer->getFullName())
            ->save('public');

        return $invoice->stream();
    }
}
