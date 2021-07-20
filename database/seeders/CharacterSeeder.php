<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Character;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Character::factory()
            ->count(Campaign::all()->count() * 5)
            ->create();
    }
}
