<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Role::create([
            'nombre' =>'consulta',
            'descripcion' => 'solo puede consultar encuestadores',

        ]);
        App\Role::create([
            'nombre' =>'superadmin',
            'descripcion' => 'Puede generar operadores, encuestadores y consultar todo'
        ]);
        App\Role::create([
            'nombre' =>'operador',
            'descripcion' => 'puede cargar y consultar encuestadores'
        ]);
    }
}
