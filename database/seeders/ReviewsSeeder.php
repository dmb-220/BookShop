<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Str;

use Faker\Factory as Faker;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($x = 0; $x < 100; $x++){

            Review::create([
                'reviews' => Str::limit($faker->paragraph, 100, '...'),
                'rating' => rand(1, 5),
                'user_id' => User::all()->random()->id,
                'book_id' => Book::approved()->get()->random()->id,
            ]);

        }
    }
}
