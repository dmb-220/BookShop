<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(GenresSeeder::class);
        
        $this->call(BookSeeder::class);
        $this->call(ReviewsSeeder::class);
    }
}
