<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.author.index')
            ->with('authors', Author::with('books')
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
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('admin.author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        //Atliekam validacija
        $request->validate([
            'name' => 'required|min:3|max:50',
        ]);

        //irasom i duomenu baze
        $author->update($request->all());
        //gristam i pradini puslapi
        //siunciam pranesima kad irasymas atliktas
        return redirect()->route('admin.authors.index')
        ->with('success','Authors updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if(!$author->books->count()){
            $author->delete();
            //gristam i pradini puslapi
            //siunciam pranesima kad irasymas atliktas
            return redirect()->route('admin.authors.index')
            ->with('success','Author deleted successfully.');
        }else{
            return redirect()->route('admin.authors.index')
            ->with('success','Genre deleted fail. Create Book for this genre!');
        }
    }
}