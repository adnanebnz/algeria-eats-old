<?php

namespace App\Livewire;

use App\Models\Artisan;
use App\Models\User;
use Livewire\Component;

class ArtisanForm extends Component
{
    public $nom;
    public $prenom;
    public $num_telephone;
    public $adresse;
    public $email;
    public $password;
    public $password_confirmation;
    public $type_service;
    public $desc_entreprise;
    public $heure_ouverture;
    public $heure_fermeture;

    protected $rules = [
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'num_telephone' => 'required|string',
        'adresse' => 'required|string',
        'desc_entreprise' => 'required|string',
        'heure_ouverture' => 'required|string',
        'heure_fermeture' => 'required|string',
        'type_service' => 'required|in:sucree,salee,sucree_salee',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:3|confirmed',
        'password_confirmation' => 'required|same:password',
    ];
    public function submit()
    {
        $validatedData = $this->validate();
        $validatedData['password'] = bcrypt($validatedData['password']);
        $creation = User::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'num_telephone' => $validatedData['num_telephone'],
            'adresse' => $validatedData['adresse'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);
        Artisan::create([
            'user_id' => $creation->id,
            'type_service' => $validatedData['type_service'],
            'desc_entreprise' => $validatedData['desc_entreprise'],
            'heure_ouverture' => $validatedData['heure_ouverture'],
            'heure_fermeture' => $validatedData['heure_fermeture'],

        ]);

        auth()->login($creation);
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.artisan-form');
    }
}
