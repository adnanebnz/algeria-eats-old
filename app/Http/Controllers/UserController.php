<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $totalPendingOrders = Order::where("buyer_id", auth()->user()->id)
            ->orWhere("status", "!=", "completed")
            ->count();

        $orders = Order::where("buyer_id", auth()->user()->id);
        $totalSpent = 0;
        foreach ($orders as $order) {
            $totalSpent += $order->total;
        }
        return view("user.dashboard", [
            "orders" => $orders,
            "totalOrders" => $orders->count(),
            "totalSpent" => $totalSpent,
            "totalPendingOrders" => $totalPendingOrders,
        ]);
    }

    public function ordersIndex(Request $request)
    {
        $query = Order::select(
            "id",
            "status",
            "created_at",
            "buyer_id",
            "artisan_id",
            "adresse",
            "wilaya",
            "daira",
            "commune"
        )->where("buyer_id", auth()->user()->id);

        // Filtering by search term of artisan name
        if ($request->has("search")) {
            $query->whereHas("artisan", function ($query) {
                $query
                    ->where("nom", "like", "%" . request("search") . "%")
                    ->orWhere("prenom", "like", "%" . request("search") . "%");
            });
        }

        // Filtering by date

        if ($request->has("date")) {
            $date = $request->input("date");
            if ($date == "nouveau") {
                $query->orderBy("created_at", "desc");
            } elseif ($date == "ancien") {
                $query->orderBy("created_at", "asc");
            }
        }

        $orders = $query->paginate(10);
        return view("user.orders.order", [
            "orders" => $orders,
        ]);
    }

    public function showOrder(Order $order)
    {
        return view("user.orders.show", [
            "order" => $order,
        ]);
    }

    public function generateInvoice(Order $order)
    {
        $customer = new Buyer([
            "name" => $order->buyer->getFullName(),
            "custom_fields" => [
                "Adresse" => $order->adresse,
                "Wilaya" => $order->wilaya,
                "Daira" => $order->daira,
                "Commune" => $order->commune,
                "Numéro de Telephone" => $order->buyer->num_telephone,
                "Email" => $order->buyer->email,
            ],
        ]);

        $artisan = new Party([
            "name" => $order->artisan->getFullName(),
            "custom_fields" => [
                "Adresse" => $order->artisan->adresse,
                "Wilaya" => $order->artisan->wilaya,
                "Numéro de Telephone" => $order->artisan->num_telephone,
                "Email" => $order->artisan->email,
            ],
        ]);

        $items = $order->orderItems->map(function ($orderItem) {
            return InvoiceItem::make($orderItem->product->nom)
                ->pricePerUnit($orderItem->product->prix)
                ->quantity($orderItem->quantity);
        });

        $invoice = Invoice::make()
            ->seller($artisan)
            ->buyer($customer)
            ->addItems($items)
            ->dateFormat("d/m/Y")
            ->currencySymbol("DA")
            ->currencyCode("DZD")
            ->currencyFormat("{VALUE} {SYMBOL}")
            ->logo(public_path("assets\LOGO.png"))
            ->filename(
                "invoice_" . $order->id . "_" . $order->buyer->getFullName()
            )
            ->save("public");

        return $invoice->stream();
    }
}
