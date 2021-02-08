<?php

namespace App\Http\Livewire;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class BookCreate extends Component
{

    public $title;
    public $author;
    public $cover;
    public $genre;
    public $description;

    public function submit()
    {
        $validatedData = $this->validate([
            'title' => 'required|min:6',
            'author' => 'required',
            'cover' => 'required',
            'genre' => 'required',
            'description' => 'required',
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        Book::create($validatedData);
        return redirect()->to('/');
    }


    public function render()
    { 
        return view('livewire.book-create');
    }
}
