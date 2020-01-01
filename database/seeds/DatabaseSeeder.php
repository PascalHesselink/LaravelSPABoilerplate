<?php

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

        $this->call(DefaultUserSeeder::class);
    }

    /**
     * Seed the given connection from the given path.
     *
     * @param array|string $class
     * @param bool $silent
     * @return $this
     */
    public function call($class, $silent = false)
    {
        $classes = Arr::wrap($class);
        $this->command->getOutput()->writeln("");
        foreach ($classes as $class) {
            $queryCount = 0;
            \Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) use (&$queryCount) {
                ++$queryCount;
            });
            $startTime = microtime(true);
            $this->resolve($class)->__invoke();
            $endTime = microtime(true);
            $seconds = number_format($endTime - $startTime, 2);
            $this->command->getOutput()->writeln("<info>[{$class}]</info> has been seeded, <info>{$queryCount}</info> queries have been executed in {$seconds} second(s)");
        }
        $this->command->getOutput()->writeln("");

        return $this;
    }
}
