<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class Books extends Component
{
      
    public function render()
    {
        return view('livewire.books', [
            'books_list' => Book::all()
        ]);
    }
}
