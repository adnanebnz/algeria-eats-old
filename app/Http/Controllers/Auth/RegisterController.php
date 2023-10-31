<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegisterForm(): View
    {
        return view('auth.register');
        // TODO TO CREATE
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'role' => 'required|string',
            // TODO TO MODIFY AND ADD ATTRIBUTES OF DELIVERYMAN OR ARTISAN
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        $data['password'] = bcrypt($data['password']);
        if ($data['role'] === 'artisan') {
            $creation = User::create($data);
            // TODO CREATE ARTISAN
        } else if ($data['role'] === 'delivery_man') {
            $user = User::create($data);
            // TODO CREATE DELIVERY MAN
        } else {
            $user = User::create($data);
        }

        auth()->login($user);

        return redirect()->route('index');
    }
}
