<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    protected $table = 'pedidos';

    protected function clientes(){
        return $this->belongsTo('App\Cliente');
    }

    protected function reparables(){
        return $this->belongsTo('App\Reparable');
    }

}
