<?php

namespace App\Livewire;

use App\Models\Consumer;
use App\Models\User;
use Livewire\Component;

class ConsumerForm extends Component
{
    public $nom;
    public $prenom;
    public $num_telephone;
    public $adresse;
    public $email;
    public $password;
    public $password_confirmation;
    protected $errorBag = 'myValidationBag';

    protected $rules = [
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'num_telephone' => 'required|string',
        'adresse' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:3|confirmed',
        'password_confirmation' => 'required|same:password',
    ];

    public function submit()
    {
        $validatedData = $this->validate();
        $validatedData['password'] = bcrypt($validatedData['password']);
        $creation = User::create($validatedData);
        Consumer::create([
            'user_id' => $creation->id,
        ]);

        auth()->login($creation);
        return redirect()->to('/');
    }
    public function render()
    {
        return view('livewire.consumer-form');
    }
}
