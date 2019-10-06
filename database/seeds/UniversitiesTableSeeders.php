<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversitiesTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universities')->insert([
            'name' => 'Universidad Autónoma de Santo Domingo',
            'acronym' => 'UASD',
        ]);

        DB::table('universities')->insert([
            'name' => 'Universidad Abierta Para Adultos',
            'acronym' => 'UAPA',
        ]);

        DB::table('universities')->insert([
            'name' => 'Instituto Tecnológico de Santo Domingo',
            'acronym' => 'INTEC',
        ]);

        DB::table('universities')->insert([
            'name' => 'Instituto Técnico Superior Comunitario',
            'acronym' => 'ITSC',
        ]);

        DB::table('universities')->insert([
            'name' => 'Universidad APEC',
            'acronym' => 'UNAPEC',
        ]);
    }
}
