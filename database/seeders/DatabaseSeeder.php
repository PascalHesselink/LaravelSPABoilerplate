<?php

namespace Database\Seeders;

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
        $this->command->callSilent('migrate:refresh');
        $this->command->callSilent('passport:install');

        $this->call(DefaultUsersSeeder::class);
    }
}
