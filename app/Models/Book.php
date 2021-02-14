<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','title', 'cover', 'description', 'check', 'price',
    ];

    public function getStrTitleAttribute(){
        return Str::words($this->title, '4');
    }

    public function getAuthorsList($author_list){
        foreach($author_list as $list){
            $authors[] = $list['name'];
        }
        $authors = implode(', ', $authors);
        
        return $authors;
    }

    public function checkGenres($genre_id, $check_list){
        foreach($check_list as $list){
            if($list->id == $genre_id){return 'checked';}
        }
    }

    public function allBookRating($rating_list){

        return $rating_list->average('rating')*20;
    }

    public function created_at_difference(){
        return Carbon::createFromTimestamp(strtotime($this->created_at))->diff(Carbon::now())->days;
   } 

    public function genres(){
        return $this->belongsToMany(Genre::class, 'book_genre')
        ->withTimestamps();
    }

    public function authors(){
        return $this->belongsToMany(Author::class, 'author_book')
        ->withTimestamps();
    }

   public function reviews(){
       return $this->hasMany(Review::class);
   }

   public function report(){
    return $this->hasOne(Report::class)
    ->where('user_id', Auth::id());
}

   public function user(){
    return $this->belongsTo(User::class);
}
}
