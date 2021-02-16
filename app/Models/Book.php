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
        'user_id','title', 'cover', 'description', 'check', 'price', 'discount'
    ];

    public function getIsNewAttribute(){
        return now()->subDays(7) <= $this->created_at;
     }

    public function scopeCheck($query){
        $query->where('check', 1);
    }

    public function getStrTitleAttribute(){
        return Str::words($this->title, '4');
    }

    public function getStrDescriptionAttribute(){
        return Str::words($this->description, '30');
    }

    public function getDiscountSumAttribute()
    {
        return number_format($this->price - ($this->price*($this->discount/100)), 2);
    }


    public function AuthorsList($author_list){
        $authors = array();
        foreach($author_list as $list){
            $authors[] = $list['name'];
        }
        $author = "";
        if(count($authors)){
            $author = implode(', ', $authors);
        }
        
        return $author;
    }
    public function GenreList($genre_list){
        //sukuriam tuscia masyva, nes esant klaida
        //nepaduodama reiksme, ar neturi reiksmiu
        $genres = array();
        foreach($genre_list as $list){
            $genres[] = $list['genre'];
        }
        //susikuriam stringa kad reik nera
        $genre = "";
        if(count($genres)){
            $genre = implode(', ', $genres);
        }
        
        return $genre;
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
