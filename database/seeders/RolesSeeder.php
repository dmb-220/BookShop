<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array("Admin", 'User');

        foreach($roles as $role){
            Role::create([
                'name' => $role,
            ]);
        }
    }
}
