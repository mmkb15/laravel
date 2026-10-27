<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Review list
    public function index(Request $request)
    {
        $reviews = Review::with('user', 'product')
            ->when($request->rating, function ($query) use ($request) {
                $query->where('rating', $request->rating);
            })
            ->latest()
            ->paginate(10);

        return view('admin.reviews.index', compact('reviews'));
    }

    // Review details দেখা
    public function show(Review $review)
    {
        $review->load('user', 'product');
        return view('admin.reviews.show', compact('review'));
    }

    // Review delete করা
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
    }
}
