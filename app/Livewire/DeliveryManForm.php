<?php

namespace App\Livewire;

use App\Models\DeliveryMan;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeliveryManForm extends Component
{
    use WithFileUploads;

    public $nom;
    public $image;
    public $prenom;
    public $num_telephone;
    public $adresse;
    public $email;
    public $est_disponible;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'num_telephone' => 'required|string',
        'adresse' => 'required|string',
        'email' => 'required|email|unique:users',
        'image' => 'nullable|image|max:4096',
        'password' => 'required|min:3|confirmed',
        'password_confirmation' => 'required|same:password',
        'est_disponible' => 'required|string|in:true,false',
    ];
    public function submit()
    {

        $validatedData = $this->validate();
        $validatedData['password'] = bcrypt($validatedData['password']);
        if ($this->image) {
            $imagePath = $this->image->store('profile_images', 'public');
            $validatedData['image'] = $imagePath;
        }
        $creation = User::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'num_telephone' => $validatedData['num_telephone'],
            'adresse' => $validatedData['adresse'],
            'email' => $validatedData['email'],
            'image' => $validatedData['image'],
            'password' => $validatedData['password'],
        ]);
        if ($validatedData['est_disponible'] === 'true') {
            $validatedData['est_disponible'] = true;
        } else {
            $validatedData['est_disponible'] = false;
        }
        DeliveryMan::create([
            'user_id' => $creation->id,
            'est_disponible' => $validatedData['est_disponible'],
        ]);

        auth()->login($creation);
        return redirect()->to('/');
    }
    public function render()
    {
        return view('livewire.delivery-man-form');
    }
}
