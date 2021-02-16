<?php

namespace App\Http\Controllers\Admin;
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
        return view('admin.book.index')
        ->with('books', 
        Book::with('authors', 'genres', 'reviews')
        ->latest()
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
     * @param  \App\Models\Book  $bookShop
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book $bookShop
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.book.edit', compact('book'))
        ->with('genres', 
            Genre::orderBy('genre', 'asc')
            ->get());
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
        //Knygos redagavimas
        if($request->_method == 'PUT'){
            $request->validate([
                'title' => 'required|min:5',
                'author' => 'required|min:10',
                'genre' => 'required|array',
                'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'description' => 'required|min:20',
            ]);

            //pasiimam request reiksmes
            $requestData = $request->all();
            $requestData['check'] = 0;
            //jei neuzkeliama naujas cover
            $requestData['cover'] = $book->cover;

            if($request->cover){
                //JEI NAUJAI IKELIAMAS cover
                $request->validate([
                    'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);

                 //kad neissitrintu default cover
                if($book->cover != 'cover.png'){
                    if(Storage::exists('public/'.$book->cover)){
                        Storage::delete('public/'.$book->cover);
                    }else{      
                        dd('File does not exists.');
                    }
                }


                //ikeliam cover nuotrauka
                $imageName = time().'.'.$request->cover->extension();  
                $request->cover->storeAs('public', $imageName);

                //pridedam trukstamas reiksmes, irasymui i DB
                //naujas cover
                $requestData['cover'] = $imageName;
            }

            //tikrinam vienas Autorius ar keli
            //atskiriame kableliu
            $authors = explode(",", $request->author);

            //var_dump($authors);
            //irasom i duomenu baze
            $book->update($requestData);
            //knygai priskiriame zanrus
            $book->genres()->sync($request->genre);

            //Irasom autorius
            //var_dump($authors);

            foreach($authors as $author){
                $author_data = Author::updateOrCreate(['name' => trim($author)], ['name' => trim($author)]);
                //pasiimam autoriu ID
                $author_id[] = $author_data->id;
            }

            //knygai priskiriame autorius
            $book->authors()->sync($author_id);
            //gristam i pradini puslapi
            //siunciam pranesima kad irasymas atliktas
            return redirect()->route('admin.books.index')
            ->with('success','Book update successfully.');
        }

        //knygos patvirtinimas
        if($request->_method == 'PATCH'){
        $book->update(array('check' => 1));
        //gristam i pradini puslapi
        //siunciam pranesima kad irasymas atliktas
        return redirect()->route('admin.books.index')
        ->with('success','Book verify successfully.');
        }
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
        
        $book->delete();

        //$book->reports->delete();
        
        //gristam i pradini puslapi
        //siunciam pranesima kad irasymas atliktas
        return redirect()->route('admin.books.index')
        ->with('success','Book deleted successfully.');
    }
}
