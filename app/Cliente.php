<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table = 'clientes';

    public function pedidos(){
        return $this->hasMany('App\Pedido');
    }

    public function presupuestos(){
        return $this->hasMany('App\Presupuesto');
    }

    public function facturas(){
        return $this->hasMany('App\Factura');
    }

    public function reparables(){
        return $this->hasMany('App\Reparable');
    }

}
