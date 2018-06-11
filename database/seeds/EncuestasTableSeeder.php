<?php

use Illuminate\Database\Seeder;

class EncuestasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Encuesta::create([
            'nombre' => 'ENGHo',

        ]);

        App\Encuesta::create([
            'nombre' => 'CNA',
        ]);

        App\Encuesta::create([
            'nombre' => 'ENPPD',
        ]);

        App\Encuesta::create([
            'nombre' => 'EOI',
        ]);

        App\Encuesta::create([
            'nombre' => 'EPA',
        ]);

        App\Encuesta::create([
            'nombre' => 'EPH',
        ]);

        App\Encuesta::create([
            'nombre' => 'IPC',
        ]);
    }
}
