<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $themes = [

            [
                'name' => 'Science Fiction'
            ],
            [
                'name' => 'Horreur'
            ],
            [
                'name' => 'Fantasy'
            ],
            [
                'name' => 'Space Opera'
            ],
            [
                'name' => 'Dystopie'
            ],
            [
                'name' => 'Steampunk'
            ],
            [
                'name' => 'Cyberpunk'
            ],
            [
                'name' => 'Post-apocalyptique'
            ],
            [
                'name' => 'Contemporain'
            ],
            [
                'name' => 'Autre'
            ]
        ];

        DB::table('themes')->insert($themes);
    }
}
