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
                'name' => 'Fantaisie'
            ],
            [
                'name' => 'Guerre'
            ],
            [
                'name' => 'Dystopie'
            ],
            [
                'name' => 'Utopie'
            ],
            [
                'name' => 'Aventure'
            ]
        ];

        DB::table('themes')->insert($themes);
    }
}
