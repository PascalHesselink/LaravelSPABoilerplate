<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        foreach (config('users') as $user) {
            User::factory()
                ->create([
                    'name'  => $user['name'],
                    'email' => $user['email']
                ]);
        }
    }
}
