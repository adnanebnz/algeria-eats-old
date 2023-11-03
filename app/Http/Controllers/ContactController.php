<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $data =  $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        $contact = Contact::create($data);
        return redirect()->route('index')->with('status', 'Votre message a bien été envoyé');
    }
}
