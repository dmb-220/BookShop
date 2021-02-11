<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
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
        $book = Book::where('check', NULL)
        ->orderBy('created_at', 'desc')
        ->paginate(25);

        $genre = Genre::has('books', '>=', 1)
        ->limit(10)
        ->get();

        return view('book_index')
        ->with('books', $book)
        ->with('genres', $genre); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('user.book_create')
            ->with('genres', Genre::orderBy('genre', 'asc')
            ->get());
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
            'genre' => 'required|array',
            'description' => 'required|min:20',
        ]);

        //ikeliam cover nuotrauka
        $imageName = time().'.'.$request->cover->extension();  
        $request->cover->storeAs('public', $imageName);
        //pasiimam request reiksmes
        $requestData = $request->all();
        //pridedam trukstamas reiksmes, irasymui i DB
        $requestData['cover'] = $imageName;
        $requestData['user_id'] = Auth::id();
        $requestData['check'] = "0";
        //tikrinam vienas Autorius ar keli
        //atskiriame kableliu
        $authors = explode(",", $request->author);

        //var_dump($authors);
        //irasom i duomenu baze
        $book_id = Book::create($requestData);
        //knygai priskiriame zanrus
        $book_id->genres()->sync($request->genre);

        //Irasom autorius
        foreach($authors as $author){
            $author_data = Author::updateOrCreate(['name' => $author]);
            //pasiimam autoriu ID
            $author_id[] = $author_data->id;
        }

        //knygai priskiriame autorius
        $book_id->authors()->sync($author_id);
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
        return view('book_view', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book_view', compact('book'));
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
     * @param  \App\Models\BookShop  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
