<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;
use Cookie;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::approved()
            ->with('authors', 'genres', 'reviews')
            ->latest()
            ->paginate(25);

        $genres = Genre::has('books', '>=', 5)
            ->limit(10)
            ->get();

        return view('book_index', compact('books', 'genres')); 
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book_show', compact('book'));
    }

    public function genres_show($genre)
    {
        $books = Book::approved()
            ->with('authors', 'genres', 'reviews')
            ->whereHas('genres', function ($query) use($genre) {
                $query->where('genre_id', $genre);
            })
            ->latest()
            ->paginate(20);

        return view('genres_show', compact('books'));
    }

    public function search_show(Request $request)
    {
        $request->validate([
            'search' => 'required|min:3',
        ]);

        $keyword = "%{$request->search}%";

        $books = Book::approved()
            ->with('authors', 'genres', 'reviews')
            ->where( function($query) use ($keyword) {
            //title
                $query->where('title','LIKE', $keyword);
            //authors
                $query->orWhereHas('authors' ,function($query) use ($keyword) {
                    $query->where('name', 'LIKE', $keyword);
                });
            //genre
                $query->orWhereHas('genres' ,function($query) use ($keyword) {
                    $query->where('name', 'LIKE', $keyword);
                });
            })->paginate(25);

            Cookie::queue('search', $request->search);
        
        return view('search_show', compact('books'));
    }
}
