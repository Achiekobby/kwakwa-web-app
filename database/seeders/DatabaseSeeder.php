<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        // the below is for factory class
        \App\Models\Service::factory(20)->create();

        // The below is for seeder class
        // $this->call([ServiceCategorySeeder::class]);
    }
}
