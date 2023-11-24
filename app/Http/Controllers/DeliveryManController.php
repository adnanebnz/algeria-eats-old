<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DeliveryManController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('deliveryMan');
    }
    public function index()
    {

        $userId = auth()->user()->id;
        $latestDeliveries = Delivery::where('is_completed', true)
        ->where('deliveryMan_id', $userId)
        ->latest('created_at')
        ->take(5)
        ->get();

        $completedDeliveriesToday = Delivery::where('is_completed', true)
        ->where('deliveryMan_id', $userId)
        ->whereBetween('updated_at', [now()->startOfDay(), now()->endOfDay()])
        ->count();
        $uncompletedDeliveriesToday = Delivery::where('is_completed', false)
        ->where('deliveryMan_id', $userId)
        ->whereBetween('updated_at', [now()->startOfDay(), now()->endOfDay()])
        ->count();

        $completedDeliveriesThisWeek = Delivery::where('is_completed', true)
        ->where('deliveryMan_id', $userId)
        ->whereBetween('updated_at', [now()->startOfWeek(), now()->endOfWeek()])
        ->count();

        $completedDeliveriesThisMonth = Delivery::where('is_completed', true)
        ->where('deliveryMan_id', $userId)
        ->whereBetween('updated_at', [now()->startOfMonth(), now()->endOfMonth()])
        ->count();


        return view("deliveryMan.dashboard", [
            "deliveries" => $latestDeliveries,
            "countday" => $completedDeliveriesToday,
            "countweek" =>$completedDeliveriesThisWeek,
            "countmonth" =>$completedDeliveriesThisMonth,
            "uncompleted" =>$completedDeliveriesToday
        ]);
    }
    public function deliveriesIndex()
    {

        $userId = auth()->user()->id;

        $deliveries = Delivery::where('is_completed', false)
            ->where('is_accepted', false)
            ->orWhere(function ($query) use ($userId) {
                $query->where('is_accepted', true)
                    ->where('deliveryMan_id', $userId);
            })
            ->latest('created_at')
            ->paginate(10);

        
        return view('deliveryMan.deliveries', [
            "deliveries" => $deliveries
        ]);
    }

    public function accept($delivery_id)
    {

        $delivery = Delivery::findOrFail($delivery_id);
        $userId = auth()->user()->id;
        $delivery->update([
            'is_accepted' => true,
            'deliveryMan_id' => $userId,

        ]);

        Alert::success('Succès', 'livraison accepter !');
        return redirect()->route('delivery.index')->with('success', 'Delivery accepted successfully');
    }


    public function reject($delivery_id)
    {

        $delivery = Delivery::findOrFail($delivery_id);
        $delivery->update([
            'is_accepted' => false,
            'deliveryMan_id' => 0,

        ]);
        Alert::success('Succès', 'livraison rejeter !');

        return redirect()->route('delivery.index')->with('success', 'Delivery rejected successfully');
    }

    public function complete($delivery_id)
    {

        $delivery = Delivery::findOrFail($delivery_id);
        $delivery->update([
            'is_completed' => true,
        ]);
        Alert::success('Succès', 'livraison completer !');

        return redirect()->route('delivery.index')->with('success', 'Delivery completed successfully');
    }
}
