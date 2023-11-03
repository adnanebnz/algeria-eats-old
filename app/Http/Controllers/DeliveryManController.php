<?php

namespace App\Http\Controllers;

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
}
