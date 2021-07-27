<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
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
        $startDate = Carbon::createFromTimestamp($this->faker->dateTimeBetween('-30 days', '+ 30 days')->getTimestamp());
        $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addHours(random_int(2, 5));
        return  [
            'id' =>  Str::uuid(),
            'title' => ucfirst($this->faker->word) . ' ' . $this->faker->randomDigitNotNull,
            'start' => $startDate,
            'end' => $endDate,
            'place' => 'Chez ' . User::all()->random()->name,
            'URL' => $this->faker->url,
            'recap' => $this->faker->paragraph(2),
            'campaign_id' => Campaign::all()->random()->id
        ];
    }
}
