<?php

use Illuminate\Database\Seeder;

class LocalidadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Localidad::class, 160)->create();
    }
}
