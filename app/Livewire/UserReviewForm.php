<?php

namespace App\Livewire;

use App\Models\UserReview;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class UserReviewForm extends Component
{
    public $user;
    public $title;
    public $review;
    public $rating;
    public function render()
    {
        return view('livewire.user-review-form');
    }

    public function store()
    {
        $data = $this->validate([
            'title' => 'required|min:3',
            'review' => 'required|min:3',
            'rating' => 'required|numeric|min:1|max:5'
        ]);

        $user = $this->user;

        $review = UserReview::where('user_id', $user->id)
            ->where('reviewer_id', auth()->id())
            ->first();
        if ($review) {
            Alert::error('Erreur', 'Vous avez déja commenté ce produit');
            return redirect()->route('profile', $user);
        } else {
            UserReview::create([
                'user_id' => $user->id,
                'reviewer_id' => auth()->id(),
                'title' => $data['title'],
                'review' => $data['review'],
                'rating' => $data['rating']
            ]);

            $user->update([
                'rating' => $user->reviews->avg('rating')
            ]);

            $this->dispatch('userReviewAdded');

            Alert::success('Success', 'Votre commentaire a été ajouté avec succès');
            $this->reset();
            return redirect()->route('profile', $user);
        }
    }
}
