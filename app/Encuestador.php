<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuestador extends Model
{
    public function localidad(){
        $this->hasOne(App\Localidad::class);
    }
}
