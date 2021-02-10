<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','title', 'cover', 'description',
    ];

    public function genres(){
        return $this->belongstoMany(Genre::class, 'book_genre', 
        'book_id', 'genre_id')
        ->withTimestamps();
    }

    public function authors(){
        return $this->belongstoMany(Genre::class, 'book_author', 
        'book_id', 'author_id')
        ->withTimestamps();
    }

}
