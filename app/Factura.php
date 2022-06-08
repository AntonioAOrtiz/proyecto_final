<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //
    protected $table = 'facturas';

    protected function clientes(){
        return $this->belongsTo('App\Cliente');
    }

    protected function factura(){
        return $this->belongsTo('App\Factura');
    }

    
}
