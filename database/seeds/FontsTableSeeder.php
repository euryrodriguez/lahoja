<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FontsTableSeeder extends Seeder
{

    private $table = 'fonts';

    public function run()
    {
        $now = \Carbon\Carbon::now();

        DB::table($this->table)->insert([
            'name' => 'opensans',
            'font_family' => "Open Sans, sans-serif",
            'url' => 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap',
            'created_at' => $now
        ]);

        DB::table($this->table)->insert([
            'name' => 'lato',
            'font_family' => "Lato, sans-serif",
            'url' => 'https://fonts.googleapis.com/css2?family=Lato&display=swap',
            'created_at' => $now
        ]);

        DB::table($this->table)->insert([
            'name' => 'oldstandard',
            'font_family' => "Old Standard TT, serif",
            'url' => 'https://fonts.googleapis.com/css2?family=Old+Standard+TT&display=swap',
            'created_at' => $now
        ]);

        DB::table($this->table)->insert([
            'name' => 'ptserif',
            'font_family' => "PT Serif, serif",
            'url' => 'https://fonts.googleapis.com/css2?family=PT+Serif&display=swap',
            'created_at' => $now
        ]);

        DB::table($this->table)->insert([
            'name' => 'ubuntu',
            'font_family' => "Ubuntu, sans-serif",
            'url' => 'https://fonts.googleapis.com/css2?family=Ubuntu&display=swap',
            'created_at' => $now
        ]);

        DB::table($this->table)->insert([
            'name' => 'vollkorn',
            'font_family' => "Vollkorn, serif",
            'url' => 'https://fonts.googleapis.com/css2?family=Vollkorn&display=swap',
            'created_at' => $now
        ]);

        DB::table($this->table)->insert([
            'name' => 'gfsdidot',
            'font_family' => "GFS Didot, serif",
            'url' => 'https://fonts.googleapis.com/css2?family=GFS+Didot&display=swap',
            'created_at' => $now
        ]);

        DB::table($this->table)->insert([
            'name' => 'EB Garamond, serif',
            'font_family' => "EB Garamond, serif",
            'url' => 'https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap',
            'created_at' => $now
        ]);
    }
}
