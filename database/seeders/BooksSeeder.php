<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\User;

use Faker\Factory as Faker;

class BooksSeeder extends Seeder
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

            //$image = $faker->image('storage/app/public', 600, 1000, null, false);

            $book_id = Book::create([
                'title' => Str::ucfirst($faker->word()." ".$faker->word()),
                'price' => $faker->randomFloat(2, 2, 80),
                'discount' => 0,
                'description' => $faker->paragraph,
                'cover' => 'cover.png',
                'check' => rand(0, 1),
                'user_id' => User::all()->random()->id,
            ]);

            
            for($i = 0; $i <= rand(1, 3); $i++){
                $genres[$i] = Genre::all()->random()->id;
            }
            //knygai priskiriame zanrus
            $book_id->genres()->sync($genres);

            for($i = 0; $i <= rand(1, 3); $i++){
                //$authors[$i] = $faker->name;
                $author_data = Author::updateOrCreate(['name' => $faker->name]);
                //pasiimam autoriu ID
                $author_id[$i] = $author_data->id;
            }

            //knygai priskiriame autorius
            $book_id->authors()->sync($author_id);
        }
    }
}
