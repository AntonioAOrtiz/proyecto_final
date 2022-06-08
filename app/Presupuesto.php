<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    //
    protected $table = 'presupuestos';

    protected function clientes(){
        return $this->belongsTo('App\Cliente');
    }

    protected function factura(){
        return $this->hasOne('App\Factura');
    }
}
