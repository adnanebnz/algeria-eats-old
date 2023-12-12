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
        $orders = Order::where("buyer_id", auth()->user()->id)
            ->orWhere("status", "!=", "completed")
            ->take(5);
        $totalOrders_encoure = $orders->count();

        $orders_fin = Order::where("buyer_id", auth()->user()->id);
        $totalOrders = $orders_fin->count();

        $totalSpent = 0;
        foreach ($orders_fin->get() as $orders_fin) {
            $totalSpent += $orders_fin->getTotalPrice();
        }

        $orders_m = Order::where("buyer_id", auth()->user()->id);

        foreach ($orders_m->get() as $orders_m) {
            $months = $orders_m->created_at->format("d/m/Y");

            $totalSpent += $orders_m->getTotalPrice();
        }
        $months = [
            "Janvier",
            "Février",
            "Mars",
            "Avril",
            "Mai",
            "Juin",
            "Juillet",
            "Aout",
            "Septembre",
            "Octobre",
            "Novembre",
            "Décembre",
        ];

        return view("user.dashboard", [
            "orders" => $orders,
            "totalOrders" => $totalOrders,
            "totalSpent" => $totalSpent,
            "totalOrders_encoure" => $totalOrders_encoure,
            "months" => $months,
        ]);
    }

    public function orderindex(Request $request)
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
        return view("user.orders_status.order", [
            "orders" => $orders,
        ]);
    }

    public function showOrder(Order $order)
    {
        return view("user.orders_status.show", [
            "order" => $order,
        ]);
    }
}
