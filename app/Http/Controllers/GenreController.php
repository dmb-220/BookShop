<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($genre)
    {
        return view('genre_view')
        ->with('books', Book::check()
        ->with('authors', 'genres', 'reviews')
        ->whereHas('genres', function ($query) use($genre) {
            $query->where('genre_id', $genre);
        })
        ->latest('id')
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $genre
     * @return \Illuminate\Http\Response
     */
    public function show($genre)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit($genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy($genre)
    {
        //
    }
}
