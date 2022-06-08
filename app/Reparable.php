<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reparable extends Model
{
    //
    protected $table = 'reparables';

    protected function clientes(){
        return $this->belongsTo('App\Cliente');
    }

    protected function pedidos(){
        return $this->hasOne('App\Cliente');
    }
}
