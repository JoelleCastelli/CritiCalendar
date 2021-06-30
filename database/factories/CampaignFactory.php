<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>  implode(' ', $this->faker->words(2)),
            'description' => $this->faker->paragraph(2),
            'theme_id' => Theme::all()->random()->id,
            'master_id' => User::all()->random()->id,
            'created_at' => now()
        ];
    }
}
