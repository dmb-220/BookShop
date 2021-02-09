<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('book_create');
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
            'title' => 'required|min:5',
            'author' => 'required|min:10',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genre' => 'required',
            'description' => 'required|min:20',
        ]);
        //ikeliam cover nuotrauka
        $imageName = time().'.'.$request->cover->extension();  
        $request->cover->storeAs('images', $imageName);
        //pasiimam request reiksmes
        $requestData = $request->all();
        //pridedam trukstamas reiksmes, irasymui i DB
        $requestData['cover'] = $imageName;
        $requestData['user_id'] = Auth::id();
        $requestData['check'] = "0";

        //var_dump($requestData);
        //irasom i duomenu baze
        Book::create($requestData);
        //gristam i pradini puslapi
        //siunciam pranesima kad irasymas atliktas
        return redirect()->route('index')
        ->with('success','Book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
