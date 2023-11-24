<?php

namespace App\Livewire;

use App\Models\Consumer;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ConsumerForm extends Component
{
    use WithFileUploads;

    public $nom;
    public $prenom;
    public $image;
    public $num_telephone;
    public $adresse;
    public $wilaya;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'num_telephone' => 'required|string',
        'adresse' => 'required|string',
        'wilaya' => 'required|string',
        'email' => 'required|email|unique:users',
        'image' => 'nullable|image|max:4096',
        'password' => 'required|min:3|confirmed',
        'password_confirmation' => 'required|same:password',
    ];

    public function submit()
    {
        $validatedData = $this->validate();
        $validatedData['password'] = bcrypt($validatedData['password']);
        if ($this->image) {
            $imagePath = $this->image->store('profile_images', 'public');
            $validatedData['image'] = $imagePath;
        }
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
