<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('auth.profile', ['user' => $user]);
    }
}
