<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Character;
use App\Models\Theme;
use App\Models\Sessions;
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
        $this->call([SessionsSeeder::class,]);
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            ThemeSeeder::class,
            CampaignSeeder::class,
            CharacterSeeder::class,
            SessionSeeder::class
        ]);

    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
