<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view("deliveryMan.dashboard");
    }
    public function deliveriesIndex()
    {

        $deliveries = Delivery::whereHas('order', function ($query) {
            $query->where('wilaya', auth()->user()->wilaya);
        })->paginate(10);

        return view('deliveryMan.deliveries', [
            "deliveries" => $deliveries
        ]);
    }

    public function accept(Delivery $delivery)
    {
        $delivery->update([
            'deliveryMan_id' => auth()->user()->id,
            'status' => 'accepted',
        ]);

        Alert::success('Succès!', 'Livraison acceptée avec succès');
        return redirect()->route('deliveryMan.index');
    }

    // TODO MODIFY THIS
    public function complete($delivery_id)
    {

        $delivery = Delivery::findOrFail($delivery_id);
        $delivery->update([
            'is_completed' => true,
        ]);


        return redirect()->route('delivery.index')->with('success', 'Delivery completed successfully');
    }
}
