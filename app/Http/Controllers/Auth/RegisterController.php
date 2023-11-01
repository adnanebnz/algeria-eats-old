<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\Artisan;
use App\Models\Consumer;
use App\Models\DeliveryMan;
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

    public function register(RegistrationRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);
        if ($data['role'] === 'artisan') {
            $creation = User::create($data);
            $user = Artisan::create([
                'user_id' => $creation->id,
                'desc_entreprise' => $data['desc_entreprise'],
                'heure_ouverture' => $data['heure_ouverture'],
                'heure_fermeture' => $data['heure_fermeture'],
                'type_service' => $data['type_service'],
            ]);
        } else if ($data['role'] === 'delivery_man') {
            $creation = User::create($data);
            $user = DeliveryMan::create([
                'user_id' => $creation->id,
                'est_disponible' => $data['est_disponible'],
            ]);
        } else {
            $creation = User::create($data);
            $user = Consumer::create([
                'user_id' => $creation->id,
            ]);
        }

        auth()->login($user);

        return redirect()->route('index');
    }
}
