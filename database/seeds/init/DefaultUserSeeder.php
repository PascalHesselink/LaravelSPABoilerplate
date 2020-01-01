<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
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
            factory(User::class)
                ->create([
                    'name'  => $user['name'],
                    'email' => $user['email']
                ]);
        }
    }
}
