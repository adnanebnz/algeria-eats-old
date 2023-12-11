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
        $this->middleware("auth");
        $this->middleware("deliveryMan");
    }
    public function index()
    {
        $userId = auth()->user()->id;

        $latestDeliveries = Delivery::where("status", "delivered")
            ->where("deliveryMan_id", $userId)
            ->latest("created_at")
            ->paginate(6);

        $completedDeliveriesToday = Delivery::where("status", "delivered")
            ->where("deliveryMan_id", $userId)
            ->whereBetween("updated_at", [
                now()->startOfDay(),
                now()->endOfDay(),
            ])
            ->count();

        $uncompletedDeliveriesToday = Delivery::where("status", "delivering")
            ->where("deliveryMan_id", $userId)
            ->whereBetween("updated_at", [
                now()->startOfDay(),
                now()->endOfDay(),
            ])
            ->count();

        $completedDeliveriesThisWeek = Delivery::where("status", "delivered")
            ->where("deliveryMan_id", $userId)
            ->whereBetween("updated_at", [
                now()->startOfWeek(),
                now()->endOfWeek(),
            ])
            ->count();

        $completedDeliveriesThisMonth = Delivery::where("status", "delivered")
            ->where("deliveryMan_id", $userId)
            ->whereBetween("updated_at", [
                now()->startOfMonth(),
                now()->endOfMonth(),
            ])
            ->count();
        // prepare data for chart
        $chartData = Delivery::where("status", "delivered")
            ->where("deliveryMan_id", $userId)
            ->whereBetween("updated_at", [
                now()->startOfMonth(),
                now()->endOfMonth(),
            ])
            ->get()
            ->groupBy(function ($val) {
                return \Carbon\Carbon::parse($val->updated_at)->format("m");
            });
        $chartData = $chartData->map(function ($item, $key) {
            return $item->count();
        });
        $chartData = $chartData->toArray();
        $chartData = array_values($chartData);
        $chartData = implode(",", $chartData);
        $chartData = "[" . $chartData . "]";
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
            "Decembre",
        ];

        return view("deliveryMan.dashboard", [
            "deliveries" => $latestDeliveries,
            "countday" => $completedDeliveriesToday,
            "countweek" => $completedDeliveriesThisWeek,
            "countmonth" => $completedDeliveriesThisMonth,
            "uncompleted" => $uncompletedDeliveriesToday,
            "chartData" => $chartData,
            "months" => $months,
        ])->with(
            "i",
            ($latestDeliveries->currentPage() - 1) *
                $latestDeliveries->perPage()
        );
    }

    public function deliveriesIndex(Request $request)
    {
        $query = Delivery::select(
            "id",
            "status",
            "created_at",
            "updated_at",
            "order_id",
            "deliveryMan_id"
        );

        // FILTERING BY ARTISAN NAME
        if ($request->has("search")) {
            $query->whereHas("order.artisan", function ($query) {
                $query
                    ->where("nom", "like", "%" . request("search") . "%")
                    ->orWhere("prenom", "like", "%" . request("search") . "%")
                    ->orWhere(
                        "num_telephone",
                        "like",
                        "%" . request("search") . "%"
                    )
                    ->orWhere("email", "like", "%" . request("search") . "%")
                    ->orWhereRaw(
                        "CONCAT(nom, ' ', prenom) LIKE ?",
                        "%" . request("search") . "%"
                    );
            });
        }

        // FILTER BY STATUS
        if ($request->has("status")) {
            $query->where("status", request("status"));
        }

        // FILTER BY WILAYA
        if ($request->filled("wilaya")) {
            $query->whereHas("order", function ($query) {
                $query->where("wilaya", request("wilaya"));
            });
        }

        // FILTERING BY DATE
        if ($request->has("date")) {
            $date = $request->input("date");
            if ($date == "nouveau") {
                $query->orderBy("created_at", "desc");
            } elseif ($date == "ancien") {
                $query->orderBy("created_at", "asc");
            }
        }

        $deliveries = $query->paginate(10);
        // GETTING ALL WILAYAS
        $wilayas = AlgerianCitiesFacade::getAllWilayas();

        return view("deliveryMan.deliveries", [
            "deliveries" => $deliveries,
            "wilayas" => $wilayas,
        ]);
    }

    public function accept(Delivery $delivery)
    {
        // Route model binding is used to get the delivery object
        $delivery->update([
            "status" => "delivering",
            "deliveryMan_id" => auth()->user()->id,
        ]);

        Alert::success("Succès", "Livraison accepté !");
        return redirect()->route("deliveryMan.index");
    }

    public function reject(Delivery $delivery)
    {
        // Route model binding is used to get the delivery object
        $delivery->update([
            "status" => "not_started",
            "deliveryMan_id" => null,
        ]);

        Alert::success("Succès", "Livraison rejeté !");

        return redirect()->route("deliveryMan.index");
    }

    public function complete(Delivery $delivery)
    {
        // Route model binding is used to get the delivery object
        $delivery->update([
            "status" => "delivered",
        ]);
        Alert::success("Succès", "Livraison completé !");

        return redirect()->route("deliveryMan.index");
    }
}
