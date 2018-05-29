<?php

use Illuminate\Database\Seeder;

class EncuestadorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Encuestador::class, 160)->create();
    }
}
