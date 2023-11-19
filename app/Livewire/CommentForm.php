<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class CommentForm extends Component
{
    public $product;
    public $title;
    public $comment;
    public $rating;

    public function render()
    {
        return view('livewire.comment-form');
    }

    public function store()
    {
        $data = $this->validate([
            'title' => 'required|min:3',
            'comment' => 'required|min:3',
            'rating' => 'required|numeric|min:1|max:5'
        ]);

        $product = $this->product;
        Review::create([
            'product_id' => $product->id,
            'user_id' => auth()->id(),
            'title' => $data['title'],
            'comment' => $data['comment'],
            'rating' => $data['rating']
        ]);

        $this->dispatch('reviewAdded');

        Alert::success('Success', 'Votre commentaire a été ajouté avec succès');
        $this->reset();
        return redirect()->route('product.show', $product);
    }
}
