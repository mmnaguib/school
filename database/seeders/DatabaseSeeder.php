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
        // \App\Models\User::factory(10)->create();
        $this->call([NationalitySeeder::class]);
        $this->call([BloodSeeder::class]);
        $this->call([ReligionSeeder::class]);
        $this->call([SpecializationsSeeder::class]);
        $this->call([GenderSeeder::class]);
    }
}
