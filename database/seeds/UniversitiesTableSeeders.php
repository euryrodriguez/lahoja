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

        DB::table('universities')->insert([
            'name' => 'Universidad Iberoamericana',
            'acronym' => 'UNIBE',
        ]);

        DB::table('universities')->insert([
            'name' => 'Pontificia Universidad Católica Madre y Maestra',
            'acronym' => 'PUCMM',
        ]);

        DB::table('universities')->insert([
            'name' => 'Universidad Nacional Pedro Henríquez Ureña',
            'acronym' => 'UNPHU',
        ]);

        DB::table('universities')->insert([
            'name' => 'Instituto Tecnológico de Las Américas',
            'acronym' => 'ITLA',
        ]);

        DB::table('universities')->insert([
            'name' => 'Universidad Tecnológica de Santiago',
            'acronym' => 'UTESA',
        ]);

        DB::table('universities')->insert([
            'name' => 'Instituto Cultural Domínico Americano',
            'acronym' => 'ICDA',
        ]);

        DB::table('universities')->insert([
            'name' => 'Universidad Federico Henríquez y Carvajal',
            'acronym' => 'UFHEC',
        ]);

        DB::table('universities')->insert([
            'name' => 'Otra',
            'acronym' => 'OTRA',
        ]);
    }
}
