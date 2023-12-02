<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactTable extends Component
{
  
    public function render()
    {
        $contacts = Contact::all();
        return view('livewire.contact-table',['contacts'=>$contacts]);
    }
}
