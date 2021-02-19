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
        'user_id','title', 'cover', 'description', 'approved', 'price', 'discount'
    ];

    public function getIsNewAttribute(){
        return now()->subDays(7) <= $this->created_at;
     }

    public function scopeApproved($query){
        $query->where('approved', 1);
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


    public function ArrayToString($list){
       $array = array();
        foreach($list as $row){
            $array[] = $row['name'];
        }
        $string = "";
        if(count($array)){
            $string = implode(', ', $array);
        }
        //$author = implode(', ', collect($author_list)->pluck('name'));
        return $string;
    }


    public function CheckGenres($genre_id, $checked_list){
        foreach($checked_list as $list){
            if($list->id == $genre_id){
                return 'checked';}
        }
    }

    public function AllBookRating($rating_list)
    {
        return $rating_list->average('rating')*20;
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
    ->where('user_id', auth()->id());
}

   public function user(){
    return $this->belongsTo(User::class);
}
}
