<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Resources\ReviewsResource;

class ReviewsController extends Controller
{

    public function show($book_id)
    {
        $reviews = Review::where('book_id', $book_id)
            ->latest()
            ->paginate(10);

        return ReviewsResource::collection($reviews);
    }


    public function reviews_store(Request $request)
    {
        $request->validate([
            'reviews' => 'required|min:10|max:250',
            'rating' => 'required|numeric|min:1|max:5',
            'book_id' => 'required',
            'user_id' => 'required',
        ]);

        $review = Review::create($request->all());

        return new ReviewsResource($review);
    }

    public function destroy($review_id)
    {
        $review = Review::find($review_id);
        $review->delete();

        return response()->json('Review deleted!');
    }

}
