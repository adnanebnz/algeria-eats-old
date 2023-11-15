<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;


class DeliveryManController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('deliveryMan');
    }
    public function index()
    {
        return view("deliveryMan.dashboard");
    }
    public function deliveriesIndex()
    {
        $userId = auth()->user()->id;
    
        $deliveries = Delivery::where('is_completed', false)
            ->where(function ($query) use ($userId) {
                $query->where('is_accepted', false)
                    ->orWhere(function ($subquery) use ($userId) {
                        $subquery->where('is_accepted', true)
                            ->where('deliveryMan_id', $userId);
                    });
            })
            ->latest('created_at')
            ->paginate(10);
    
        return view('deliveryMan.deliveries', [
            "deliveries" => $deliveries
        ]);
    }
    



}
