<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.genre.index')
        ->with('genres', Genre::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.genre.create');
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
            'genre' => 'required|min:3|max:255',
        ]);

        //irasom i duomenu baze
        Genre::create($request->all());
        //gristam i pradini puslapi
        //siunciam pranesima kad irasymas atliktas
        return redirect()->route('admin.genre.index')
        ->with('success','Genre created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('admin.genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {//Atliekam validacija
        $request->validate([
            'genre' => 'required|min:3|max:255',
        ]);

        //irasom i duomenu baze
        $genre->update($request->all());
        //gristam i pradini puslapi
        //siunciam pranesima kad irasymas atliktas
        return redirect()->route('admin.genre.index')
        ->with('success','Genre updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        if(!$genre->books->count()){
            $genre->delete();
            //gristam i pradini puslapi
            //siunciam pranesima kad irasymas atliktas
            return redirect()->route('genre.index')
            ->with('success','Genre deleted successfully.');
        }else{
            return redirect()->route('genre.index')
            ->with('success','Genre deleted fail. Create Book for this genre!');
        }
    }
}
