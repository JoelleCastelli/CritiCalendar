<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Session::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word . ' ' . $this->faker->randomDigitNotNull,
            'date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years', $timezone = 'Europe/Paris'),
            'place' => 'Chez ' . User::all()->random()->name,
            'URL' => $this->faker->url,
            'recap' => $this->faker->paragraph(2),
            'campaign_id' => Campaign::all()->random()->id
        ];
    }
}
