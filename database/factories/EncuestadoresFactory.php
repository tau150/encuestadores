<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Encuestador::class, function (Faker $faker) {
    return [
        'cargo' => 'Encuestador',
        'localidad_id' => App\Localidad::all()->random()->id,
        'apellido' => $faker->lastName,
        'nombre' => $faker->name,
        'dni'=> $faker->numberBetween($min = 21000000, $max = 38000000),
        'encuesta' => 'AAA',
        'img' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
