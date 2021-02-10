<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookShop;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.index')
        ->with('books', 
        Book::orderBy('created_at', 'desc')
        ->simplepaginate(10));
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
     * @param  \App\Models\BookShop  $bookShop
     * @return \Illuminate\Http\Response
     */
    public function show(BookShop $bookShop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookShop  $bookShop
     * @return \Illuminate\Http\Response
     */
    public function edit(BookShop $bookShop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookShop  $bookShop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookShop $bookShop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookShop  $bookShop
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookShop $bookShop)
    {
        //
    }
}
