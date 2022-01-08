<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(User $user)
    {
        request()->validate([
            'body' => 'required',
            'rating' => 'required|numeric|between:1,10'
        ]);

        $user->reviews()->create([
            'user_id' => $user->id,
            'reviewer_id' => auth()->user()->id,
            'body' => request('body'),
            'rating' => request('rating')
        ]);

        return back()->with('success', 'Atsauksme izveidota!');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return back()->with('success', 'Atsauksme izdzēsta!');
    }
}
