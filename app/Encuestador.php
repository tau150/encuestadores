<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestador extends Model
{

    protected $guarded = [];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucfirst($value);
    }

    public function setApellidoAttribute($value)
    {
        $this->attributes['apellido'] = ucfirst($value);
    }


    public function localidad(){
        return $this->belongsTo(\App\Localidad::class);
    }

    public function encuesta(){
        return $this->belongsTo(\App\Encuesta::class);

    }
}
