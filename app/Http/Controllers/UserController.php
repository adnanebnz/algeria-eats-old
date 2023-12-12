<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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

        // Filtering by search term of buyer name
        if ($request->has("search")) {
            $query->whereHas("artisan", function ($query) {
                $query
                    ->where("nom", "like", "%" . request("search") . "%")
                    ->orWhere("prenom", "like", "%" . request("search") . "%")
                    ->orWhere("email", "like", "%" . request("search") . "%")
                    ->orWhere("phone", "like", "%" . request("search") . "%")
                    ->orWhere(
                        'CONCAT(nom, " ", prenom)',
                        "like",
                        "%" . request("search") . "%"
                    );
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
}
