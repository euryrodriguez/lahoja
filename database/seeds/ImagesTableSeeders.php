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
            'width' => '100',
            'height' => '100',
            'universityId' => '1',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_UAPA_1.jpg',
            'width' => '200',
            'height' => '100',
            'universityId' => '2',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_INTEC_1.jpg',
            'width' => '100',
            'height' => '100',
            'universityId' => '3',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_ITSC_1.jpg',
            'width' => '120',
            'height' => '110',
            'universityId' => '4',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_UNAPEC_1.jpg',
            'width' => '90',
            'height' => '100',
            'universityId' => '5',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_UNIBE_1.jpg',
            'width' => '100',
            'height' => '100',
            'universityId' => '6',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_PUCMM_1.png',
            'width' => '100',
            'height' => '100',
            'universityId' => '7',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_UNPHU_1.jpg',
            'width' => '100',
            'height' => '100',
            'universityId' => '8',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_ITLA_1.png',
            'width' => '100',
            'height' => '100',
            'universityId' => '9',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_UTESA_1.gif',
            'width' => '100',
            'height' => '100',
            'universityId' => '10',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_ICDA_1.jpg',
            'width' => '150',
            'height' => '100',
            'universityId' => '11',
        ]);

        DB::table('images')->insert([
            'filename' => 'Escudo_UFHEC_1.jpg',
            'width' => '100',
            'height' => '100',
            'universityId' => '12',
        ]);

    }
}
