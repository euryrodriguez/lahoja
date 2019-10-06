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
        $this->call(UniversitiesTableSeeders::class);
        $this->call(ImagesTableSeeders::class);
    }
}
