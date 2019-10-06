<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'filename' => 'Escudo_UASD_1.jpg',
            'universityId' => '1',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_UAPA_1.jpg',
            'universityId' => '2',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_INTEC_1.jpg',
            'universityId' => '3',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_ITSC_1.jpg',
            'universityId' => '4',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_UNAPEC_1.jpg',
            'universityId' => '5',
        ]);
    }
}
