<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Character;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $campaign =  Campaign::all()->random();
        $player =  DB::table('users')->whereNotIn('id', $campaign->id)->inRandomOrder()->first();

        return [
            'player_id' => $player->id,
            'campaign_id' => $campaign->id,
            'name' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'ancestry' => $this->faker->word,
            'class' => $this->faker->word,
            'alignment' => $this->faker->word,
            'level' => $this->faker->randomDigit,
            'XP' => $this->faker->randomDigit,
            'HP' => $this->faker->randomDigit,
            'strength' => $this->faker->numberBetween(5, 30),
            'initiative' => $this->faker->numberBetween(1, 30),
            'speed' => $this->faker->numberBetween(1, 30),
            'dexterity' => $this->faker->numberBetween(1, 30),
            'constitution' => $this->faker->numberBetween(1, 30),
            'intelligence' => $this->faker->numberBetween(1, 30),
            'wisdom' => $this->faker->numberBetween(1, 30),
            'charisma' => $this->faker->numberBetween(1, 30),
            'attacks' => $this->faker->word,
            'languages' => $this->faker->word,
            'equipment' => $this->faker->word,
            'created_at' => now(),
        ];
    }
}
