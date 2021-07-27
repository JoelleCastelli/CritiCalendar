<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return  [
            'id' =>  Str::uuid(),
            'title' => ucfirst($this->faker->word) . ' ' . $this->faker->randomDigitNotNull,
            'start' => $this->faker->dateTimeBetween($startDate = '-1 months', $endDate = '+1 months', $timezone = 'Europe/Paris'),
            'end' => $this->faker->dateTimeBetween($startDate = '-1 months', $endDate = '+1 months', $timezone = 'Europe/Paris'),
            'place' => 'Chez ' . User::all()->random()->name,
            'URL' => $this->faker->url,
            'recap' => $this->faker->paragraph(2),
            'campaign_id' => Campaign::all()->random()->id
        ];
    }
}
