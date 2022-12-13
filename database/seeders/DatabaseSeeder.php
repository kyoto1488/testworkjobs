<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $devSeeders = app()->isLocal() ? [
            FakeDataSeeder::class
        ] : [];

        $this->call(array_merge([
            AdminUserSeeder::class,
            SimpleUserSeeder::class
        ], $devSeeders));
    }
}
