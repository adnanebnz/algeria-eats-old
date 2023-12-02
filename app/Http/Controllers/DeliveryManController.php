<?php

namespace App\Http\Controllers;

use AnouarTouati\AlgerianCitiesLaravel\Facades\AlgerianCitiesFacade;
use App\Models\Delivery;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


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

        $latestDeliveries = Delivery::where('status', 'delivered')
            ->where('deliveryMan_id', $userId)
            ->latest('created_at')
            ->paginate(6);

        $completedDeliveriesToday = Delivery::where('status', 'delivered')
            ->where('deliveryMan_id', $userId)
            ->whereBetween('updated_at', [now()->startOfDay(), now()->endOfDay()])
            ->count();

        $uncompletedDeliveriesToday = Delivery::where('status', 'delivering')
            ->where('deliveryMan_id', $userId)
            ->whereBetween('updated_at', [now()->startOfDay(), now()->endOfDay()])
            ->count();

        $completedDeliveriesThisWeek = Delivery::where('status', 'delivered')
            ->where('deliveryMan_id', $userId)
            ->whereBetween('updated_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();

        $completedDeliveriesThisMonth = Delivery::where('status', 'delivered')
            ->where('deliveryMan_id', $userId)
            ->whereBetween('updated_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->count();

        return view("deliveryMan.dashboard", [
            "deliveries" => $latestDeliveries,
            "countday" => $completedDeliveriesToday,
            "countweek" => $completedDeliveriesThisWeek,
            "countmonth" => $completedDeliveriesThisMonth,
            "uncompleted" => $uncompletedDeliveriesToday,
        ])->with('i', ($latestDeliveries->currentPage() - 1) * $latestDeliveries->perPage());
    }

    public function deliveriesIndex(Request $request)
    {

        $query = Delivery::select('id', 'status', 'created_at', 'updated_at', 'order_id', 'deliveryMan_id');

        // FILTERING BY ARTISAN NAME
        if ($request->has('search')) {
            $query->whereHas('order.artisan', function ($query) {
                $query->where('nom', 'like', '%' . request('search') . '%')->orWhere('prenom', 'like', '%' . request('search') . '%');
            });
        }

        // FILTER BY STATUS
        if ($request->has('status')) {
            $query->where('status', request('status'));
        }

        // FILTER BY WILAYA
        if ($request->filled('wilaya')) {
            $query->whereHas('order', function ($query) {
                $query->where('wilaya', request('wilaya'));
            });
        } else {
            // Set a default value for 'wilaya' if it is not present in the request
            $defaultWilaya = auth()->user()->wilaya;
            $query->whereHas('order', function ($query) use ($defaultWilaya) {
                $query->where('wilaya', $defaultWilaya);
            });
        }

        // FILTERING BY DATE
        if ($request->has('date')) {
            $date = $request->input('date');
            if ($date == 'nouveau') {
                $query->orderBy('created_at', 'desc');
            } elseif ($date == 'ancien') {
                $query->orderBy('created_at', 'asc');
            }
        }

        $deliveries = $query->paginate(10);
        // GETTING ALL WILAYAS
        $wilayas = AlgerianCitiesFacade::getAllWilayas();

        return view('deliveryMan.deliveries', [
            "deliveries" => $deliveries,
            "wilayas" => $wilayas
        ]);
    }

    public function accept(Delivery $delivery)
    {
        // Route model binding is used to get the delivery object
        $delivery->update([
            'status' => 'delivering',
            'deliveryMan_id' => auth()->user()->id,
        ]);

        Alert::success('Succès', 'livraison accepter !');
        return redirect()->route('deliveryMan.index');
    }


    public function reject(Delivery $delivery)
    {
        // Route model binding is used to get the delivery object
        $delivery->update([
            'status' => 'not_started',
            'deliveryMan_id' => null,
        ]);

        Alert::success('Succès', 'livraison rejeter !');

        return redirect()->route('deliveryMan.index');
    }

    public function complete(Delivery $delivery)
    {
        // Route model binding is used to get the delivery object
        $delivery->update([
            'status' => 'delivered',
        ]);
        Alert::success('Succès', 'livraison completer !');

        return redirect()->route('deliveryMan.index');
    }
}
