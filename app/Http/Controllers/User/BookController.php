<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('authors', 'genres', 'reviews')
            ->where('user_id', auth()->id())
            ->orderBy('approved')
            ->latest()
            ->paginate(20);

        return view('user.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::orderBy('name')
            ->get();

        return view('user.book_create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'author' => 'required|min:10',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genre' => 'required|array',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'required|min:20',
        ]);

        $imageName = time().'.'.$request->cover->extension();  
        $request->cover->storeAs('public', $imageName);

        $authors = explode(",", $request->author);

        $book_id = Book::create($request->all() + [
            'cover' => $imageName,
            'user_id' => auth()->id()
        ]);

        $book_id->genres()->sync($request->genre);

        foreach($authors as $author){
            $author_data = Author::updateOrCreate(['name' => $author]);
            $author_id[] = $author_data->id;
        }

        $book_id->authors()->sync($author_id);

        return redirect()->route('index')
        ->with('success','Book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $bookShop
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('user.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book $bookShop
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $genres = Genre::orderBy('name')
            ->get();

        return view('user.book.edit', compact('book', 'genres'));
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
            $request->validate([
                'title' => 'required|min:5',
                'author' => 'required|min:10',
                'genre' => 'required|array',
                'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'description' => 'required|min:20',
            ]);

            $requestData = $request->all();

            $requestData['cover'] = $book->cover;

            if($request->cover){
                $request->validate([
                    'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);
                
                if($book->cover != 'cover.png'){
                    if(Storage::exists('public/'.$book->cover)){
                        Storage::delete('public/'.$book->cover);
                    }
                }

                $imageName = time().'.'.$request->cover->extension();  
                $request->cover->storeAs('public', $imageName);

                $requestData['cover'] = $imageName;
            }

            $authors = explode(",", $request->author);

            $book->update($requestData);

            $book->genres()->sync($request->genre);

            foreach($authors as $author){
                $author_data = Author::updateOrCreate(['name' => trim($author)], ['name' => trim($author)]);
                $author_id[] = $author_data->id;
            }

            $book->authors()->sync($author_id);

            return redirect()->route('user.books.index')
            ->with('success','Book update successfully.');  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */

    public function discount_update(Request $request, Book $book)
    {
            $request->validate([
                'discount' => 'required|numeric',
            ]);

            $book->update(array('discount' => $request->discount));

            return redirect()->route('user.books.index')
            ->with('success','Book discount add successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->genres()->detach();
        $book->authors()->detach();

        $book->reviews()->delete();
        $book->report()->delete();

        $book->delete();

        if($book->cover != 'cover.png'){
            if(Storage::exists('public/'.$book->cover)){
                Storage::delete('public/'.$book->cover);
            }
        }
          
        return redirect()->route('user.books.index')
        ->with('success','Book deleted successfully.');
    }
}
