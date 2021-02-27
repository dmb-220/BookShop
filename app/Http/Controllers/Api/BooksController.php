<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Resources\BooksResource;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::approved()
            ->with('authors', 'genres')
            ->latest()
            ->paginate(25);

        return BooksResource::collection($books);
    }

    public function show(Book $book)
    {
        return new BooksResource($book);
    }
}
