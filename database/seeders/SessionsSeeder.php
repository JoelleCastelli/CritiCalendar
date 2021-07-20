<?php


namespace Database\Seeders;
use App\Models\Sessions;
use Illuminate\Support\Str;

class SessionsSeeder extends DatabaseSeeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Sessions::insert([
            [
                'id' => Str::uuid(),
                'title' => 'Evenement 2',
                'start' => '2021-07-10T08:00:00',
                'end' => '2021-07-10T16:00:00',
                'place' => 'online',
                'URL' => 'test/local.com',
                'recap' => 'session du début de la story',
                'campaign_id' => 1,
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Evenement 3',
                'start' => '2021-07-21T08:00:00',
                'end' => '2021-07-22T16:00:00',
                'place' => 'online',
                'URL' => 'test/local.com',
                'recap' => 'session du début de la story',
                'campaign_id' => 1,
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Evenement 3',
                'start' => '2021-08-10T08:00:00',
                'end' => '2021-08-10T16:00:00',
                'place' => 'online',
                'URL' => 'test/local.com',
                'recap' => 'session du début de la story',
                'campaign_id' => 1,
            ],
        ]);
    }
}
