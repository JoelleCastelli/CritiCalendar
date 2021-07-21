<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => "Suvirtha",
                'email' => "suvirtha" . '@gmail.com',
                'password' => Hash::make('password'),
                'admin' => true,
            ],
            [
                'name' => "Joëlle",
                'email' => "joelle" . '@gmail.com',
                'password' => Hash::make('password'),
                'admin' => true,
            ],
            [
                'name' => "Coraline",
                'email' => "coraline" . '@gmail.com',
                'password' => Hash::make('password'),
                'admin' => true,
            ],
            [
                'name' => "Sylvain",
                'email' => "sylvain" . '@gmail.com',
                'password' => Hash::make('password'),
                'admin' => false,
            ],
            [
                'name' => "Romain",
                'email' => "romain" . '@gmail.com',
                'password' => Hash::make('password'),
                'admin' => false,
            ],
            [
                'name' => "Sami",
                'email' => "sami" . '@gmail.com',
                'password' => Hash::make('password'),
                'admin' => false,
            ],
            [
                'name' => "Gaël",
                'email' => "gael" . '@gmail.com',
                'password' => Hash::make('password'),
                'admin' => false,
            ],
            [
                'name' => "Océane",
                'email' => "oceane" . '@gmail.com',
                'password' => Hash::make('password'),
                'admin' => false,
            ],
        ];

        DB::table('users')->insert($users);
    }
}
