<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('auth.profile', ['user' => $user]);
    }

    public function update(User $user, Request $request)
    {
        // TODO FUNCTIONS NEEDS TO BE UPDATED AND TRANSFORM THIS TO A LIVEWIRE COMPONENT CHECK THE REGISTER MECHANISM AND DO THE SAME
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'num_telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'password' => 'nullable|string',
        ]);

        $user->update([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'num_telephone' => $data['num_telephone'],
            'adresse' => $data['adresse'],
        ]);

        // Update artisan-specific fields
        if ($user->artisan) {
            $speceficData = $request->validate([
                'heure_ouverture' => 'required|string',
                'heure_fermeture' => 'required|string',
                'desc_entreprise' => 'required|string',
            ]);

            $user->artisan->update($speceficData);
        }

        // Update deliveryman-specific fields
        if ($user->deliveryMan) {
            $speceficData = $request->validate([
                'est_disponible' => 'required|string|in:true,false',
            ]);
            if ($speceficData['est_disponible'] === 'true') {
                $speceficData['est_disponible'] = true;
            } else {
                $speceficData['est_disponible'] = false;
            }
            $user->deliveryMan->update($speceficData);
        }

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->input('password'))]);
        }

        return redirect()->route('profile', ['user' => $user])->withStatus('Profil mis à jour !');
    }
}
