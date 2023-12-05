<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Order;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::where('consumer_id', auth()->user()->id)->take(5);
        return view('user.dashboard', [
            "orders" => $orders
        ]);
    }

    public function orderindex()
    {
        $orders = Order::where('buyer_id', auth()->user()->id)->paginate(10);
        return view('user.orders_status.order', [
            "orders" => $orders
        ]);
    }

    public function showOrder(Order $order)
    {
        return view('user.orders_status.show', [
            "order" => $order,
        ]);
    }
}
