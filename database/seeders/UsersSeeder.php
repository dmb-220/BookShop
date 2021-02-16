<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        User::factory()->count(50)->create();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'birthday' => '1990-01-01',
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'birthday' => '1990-01-01',
            'role_id' => '2'
        ]);
    }
}
