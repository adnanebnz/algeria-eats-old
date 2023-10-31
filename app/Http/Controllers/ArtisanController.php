<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    public function index(): View
    {
        return view('artisan.dashboard');
    }
    public function products()
    {
        return view('artisan.produits');
    }
}
