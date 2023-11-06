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

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            // TODO ADD ATTRIBUTE FOR THE USER TO CHANGE HIS PASSWORD AND FOR ARTISAN AND DELIVERYMAN
        ]);

        $user->update($data);

        return redirect()->route('profile', ['user' => $user])->withStatus('Profil mis à jour !');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('index')->withStatus('Votre compte a été supprimé !');
    }
}
