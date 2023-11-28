<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    function __construct()
    {
        $this->middleware('auth')->except(['index']);
        $this->middleware('checkProfileOwnership')->only(['update']);
    }

    public function index(User $user)
    {
        return view('auth.profile', ['user' => $user]);
    }

    public function update(User $user, Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'num_telephone' => 'required|string',
            'adresse' => 'required|string|max:255',
            'wilaya' => 'required|string|max:255',
            'password' => 'nullable|string',
        ]);

        $user->update([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'num_telephone' => $data['num_telephone'],
            'adresse' => $data['adresse'],
            'wilaya' => $data['wilaya'],
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

        if ($request->hasFile('image')) {
            if ($user->image) {
                // THE IMAGE IS IN public disk in profile_images folder
                Storage::disk('public')->delete($user->image);
            }
            $image = $request->file('image');
            $imagePath = $image->store('profile_images', 'public');
            $user->update(['image' => $imagePath]);
        }

        Alert::success('Profil mis à jour !', 'Votre profil a été mis à jour avec succès !');

        return redirect()->route('profile', ['user' => $user]);
    }
}
