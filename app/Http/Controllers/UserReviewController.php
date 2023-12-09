<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserReviewRequest;
use App\Models\UserReview;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserReviewController extends Controller
{
    public function store(UserReviewRequest $request)
    {
        $data = $request->validated();

        $review = UserReview::create($data);

        Alert::success('Success', 'Review submitted successfully!');

        return redirect()->route('profile', $review->user_id);
    }

    public function update(UserReviewRequest $request)
    {
        $data = $request->validated();

        $review = UserReview::find($data['review_id']);

        $review->update([
            'review' => $data['review'],
            'rating' => $data['rating'],
        ]);

        Alert::success('Success', 'Review updated successfully!');

        return redirect()->route('profile', $review->user_id);
    }


    public function acceptReview(Request $request)
    {
        $request->validate([
            'review_id' => 'required|exists:user_reviews,id',
        ]);

        $review = UserReview::find($request->review_id);

        $review->update([
            'status' => 'accepted',
        ]);

        Alert::success('Success', 'Review accepted successfully!');

        return redirect()->route('artisan.profile', $review->user_id);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'review_id' => 'required|exists:user_reviews,id',
        ]);

        $review = UserReview::find($request->review_id);

        $review->delete();

        Alert::success('Success', 'Review rejected successfully!');

        return redirect()->route('artisan.profile', $review->user_id);
    }
}
