<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Encuestador;

class Encuesta extends Model
{

    protected $fillable = [
        'nombre', 'descripcion'
    ];

    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = ucwords(strtolower($value));
    }


    public function encuestadores(){
        return $this->hasMany(Encuestador::class);
    }
}
