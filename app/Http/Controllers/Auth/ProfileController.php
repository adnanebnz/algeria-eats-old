<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        // TODO CHECK WHY ROUTE MODEL BINDING ISNT WORKING
        return view('auth.profile', ['user' => $request->user()]);
    }
}
