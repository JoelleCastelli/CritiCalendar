<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Character;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;


class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i <= Campaign::all()->count() * 30; $i++) {
            $campaign =  Campaign::all()->random();

            // Make sure that the player is not the campaign owner and plays only one character
            $excludedIds[] = $campaign->owner->id;
            foreach ($campaign->characters as $character)
                $excludedIds[] = $character->player->id;
            $player =  DB::table('users')->whereNotIn('id', $excludedIds)->inRandomOrder()->first();

            try {
                Character::create([
                    'player_id' => $player->id,
                    'campaign_id' => $campaign->id,
                    'name' => $faker->lastName,
                    'ancestry' => ucwords($faker->word),
                    'class' => ucwords($faker->word),
                    'alignment' => ucwords($faker->word),
                    'level' => $faker->randomDigit,
                    'XP' => $faker->randomDigit,
                    'HP' => $faker->randomDigit,
                    'strength' => $faker->numberBetween(5, 30),
                    'initiative' => $faker->numberBetween(1, 30),
                    'speed' => $faker->numberBetween(1, 30),
                    'dexterity' => $faker->numberBetween(1, 30),
                    'constitution' => $faker->numberBetween(1, 30),
                    'intelligence' => $faker->numberBetween(1, 30),
                    'wisdom' => $faker->numberBetween(1, 30),
                    'charisma' => $faker->numberBetween(1, 30),
                    'attacks' => ucwords(implode(', ', $faker->words(4))),
                    'languages' => ucwords(implode(', ', $faker->words(2))),
                    'equipment' => ucwords(implode(', ', $faker->words(6))),
                    'created_at' => now(),
                ]);
            } catch (\Exception $e) {
            }
        }
    }
}
