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

        \App\Models\Patient::factory()
            ->has(\App\Models\Address::factory())
            ->count(30)
            ->create();
    }
}
