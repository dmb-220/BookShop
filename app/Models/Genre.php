<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function getStrDescriptionAttribute(){
        return Str::words($this->description, '30');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_genre')
        ->withTimestamps();
    }
}
