<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','title', 'cover', 'description',
    ];

    public function genres(){
        return $this->belongsToMany(Genre::class, 'book_genre')
        ->withTimestamps();
    }

    public function authors(){
        return $this->belongsToMany(Author::class, 'book_author')
        ->withTimestamps();
    }

    public function created_at_difference(){
        return Carbon::createFromTimestamp(strtotime($this->created_at))->diff(Carbon::now())->days;
   } 
}
