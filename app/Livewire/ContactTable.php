<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactTable extends Component
{
    public function render()
    {
        $contacts = Contact::all();

        return view('livewire.contact-table', ['contacts' => $contacts]);
    }
}
