<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Company;
use App\Models\ConfigInDb;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Card::factory(10)->create();
        Company::factory(10)->create();
        ConfigInDb::factory(10)->create();
        User::factory(10)->create();
    }
}
