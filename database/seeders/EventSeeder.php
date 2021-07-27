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
            ->count(15)
            ->create();

        /*Event::insert([
            [
                'id' => Str::uuid(),
                'title' => 'Evenement 1',
                'start' => '2021-07-10T20:00:00',
                'end' => '2021-07-10T23:00:00',
                'place' => 'online',
                'URL' => 'test/local.com',
                'recap' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'campaign_id' => 1,
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Evenement 2',
                'start' => '2021-07-21T21:00:00',
                'end' => '2021-07-21T23:30:00',
                'place' => 'online',
                'URL' => 'test/local.com',
                'recap' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'campaign_id' => 1,
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Evenement 3',
                'start' => '2021-08-10T19:30:00',
                'end' => '2021-08-10T22:00:00',
                'place' => 'online',
                'URL' => 'test/local.com',
                'recap' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'campaign_id' => 1,
            ],
        ]);*/
    }
}
