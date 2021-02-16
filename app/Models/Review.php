<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','book_id', 'reviews', 'rating'
    ];


    public function getStrReviewAttribute(){
        return Str::words($this->reviews, '30');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function viewRating($rating){
        //if(!$rating){}
        return 20*$rating;
    }
}
