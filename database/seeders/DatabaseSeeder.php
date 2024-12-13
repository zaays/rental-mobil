<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Customer;
use App\Models\User;
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
        // \App\Models\User::factory(3)->create();

        $users = [

            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'name' => 'Admin Rental',

        ];


        User::create($users);
    }
}
