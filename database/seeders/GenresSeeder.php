<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            'Fantasy',
            'Adventure',
            'Romance',
            'Contemporary',
            'Dystopian',
            'Mystery',
            'Horror',
            'Thriller',
            'Paranormal',
            'Historical Fiction',
            'Science Fiction',
            'Memoir',
            'Cooking',
            'Art',
            'Self-help / Personal',
            'Development',
            'Motivational',
            'Health',
            'History',
            'Travel',
            'Guide / How-to',
            'Families & Relationships',
            'Humor',
            'Childrens',
        );

        foreach($roles as $role){
            Genre::create([
                'genre' => $role,
            ]);
        }
    }
}
