<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Character;
use App\Models\Event;
use App\Models\Theme;
use App\Models\Events;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Schema::dropIfExists('posts');

        $this->call([
            UserSeeder::class,
            ThemeSeeder::class,
            CampaignSeeder::class,
            CharacterSeeder::class,
            EventSeeder::class
        ]);

    }

    public function down()
    {
    }
}
