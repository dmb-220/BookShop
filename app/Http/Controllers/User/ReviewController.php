<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.review.index')
        ->with('reviews', Review::where('user_id', Auth::id())
        ->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Atliekam validacija
        $request->validate([
            'reviews' => 'required|min:10|max:250',
            'rating' => 'required|numeric|min:1|max:5',
            'book_id' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['user_id'] = Auth::id();

        //irasom i duomenu baze
        Review::create($requestData);

        //gristam i pradini puslapi
        //siunciam pranesima kad irasymas atliktas
        return redirect()->route('books.show', $request->book_id)
        ->with('success','Review created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('user.review.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Review $review)
    {
        //reik apsaugos, kad is isores negaliu sukurti uzklausa ir trinti reviews
        //tikrinti ar  review autorius nori ji istrinti
         $review->delete();
        //gristam i pradini puslapi
        //siunciam pranesima kad irasymas atliktas
        return redirect()->route('user.review.index')
        ->with('success','Review deleted successfully.');
    }
}
