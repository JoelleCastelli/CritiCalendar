<?php


namespace Database\Seeders;
use App\Models\Event;
use Illuminate\Support\Str;

class EventSeeder extends DatabaseSeeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::factory()
            ->count(25)
            ->create();
    }
}
