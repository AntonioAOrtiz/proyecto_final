<?php

use Illuminate\Http\Request;

//Llamadas desde la pagina Ppal.
Route::get('/', function (Request $request) {

    if ($request->session()->exists('permiso')) {
        return view('reparaciones');
    }else{
        return redirect('login');
    }
    
});

Route::get('login', function (Request $request) {
    return view('actualizaciones.login');
});

Route::get('reparaciones', function (Request $request) {
    if ($request->session()->exists('permiso')) {
        return view('reparaciones');
    }else{
        return redirect('login');
    }
});

Route::get('pedidos', function (Request $request) {

    if ($request->session()->exists('permiso')) {
        return view('componentes');
    }else{
        return redirect('login');
    }

});

Route::get('presupuestar', function (Request $request) {

    if ($request->session()->exists('permiso')) {
        return view('presupuestos');
    }else{
        return redirect('login');
    }

});

Route::get('facturas', function (Request $request) {

    if ($request->session()->exists('permiso')) {
        return view('facturas');
    }else{
        return redirect('login');
    }

});

//Llamadas desde los Formularios
//Reparaciones
Route::post('dar-de-alta', 'clientes@index');

Route::get('listado-de-clientes', 'clientes@abiertas');

//Pedidos
Route::post('pedir-pedido', 'pedidos@index');

Route::get('listado-de-pedidos', 'pedidos@listado_pedidos');

//Presupuestos
Route::post('crear-presupuesto', 'presupuestos@index');

Route::get('listado-de-presupuestos', 'presupuestos@listado_presupuestos');

//Facturas
Route::post('crear-factura', 'facturas@index');

Route::get('listado-de-facturas', 'facturas@listado_facturas');

Route::get('enviar-factura', 'facturas@sendEmail');

//Listado de Reparaciones
Route::get('ver-todas-reparaciones', 'clientes@todas_las_reparaciones');

Route::get('documento/{id}', 'clientes@ver');

Route::get('editar-reparacion/{id}', 'clientes@editar');

Route::post('actualizar-reparacion', 'clientes@actualizar');

Route::get('eliminar/{id}', 'clientes@eliminar');

//Listado de Pedidos
Route::get('editar-pedido/{id}', 'pedidos@editar');

Route::post('actualizar-pedido', 'pedidos@actualizar');

Route::get('eliminar-pedido/{id}', 'pedidos@eliminar');

//Listado de Presupuestos
Route::get('ver-todos-presupuestos', 'presupuestos@todos_los_presupuestos');

Route::get('documento-presupuesto/{id}', 'presupuestos@ver_presupuesto');

Route::get('documento-factura-presupuesto/{id}', 'presupuestos@ver_factura');

Route::get('editar-presupuesto/{id}', 'presupuestos@editar');

Route::post('actualizar-presupuesto', 'presupuestos@actualizar');

Route::get('eliminar-presupuesto/{id}', 'presupuestos@eliminar');

//Listado de Facturas
Route::get('documento-factura/{id}', 'facturas@ver_factura');

Route::get('editar-factura/{id}', 'facturas@editar');

Route::post('actualizar-factura', 'facturas@actualizar');

Route::get('eliminar-factura/{id}', 'facturas@eliminar');

// Loguear usuario

Route::get('comprobar-usuario', function (Request $request) {

    $comandas = DB::table('usuarios')
    ->where('usuario',$request->input('usuario'))
    ->where('password',$request->input('password'))/*crypt($request->input('password'), 'sffffff%%%32ssss8373!'))*/
    ->first();

    if($comandas){

        if($request->input('usuario') == 'administrador'){
            session(['permiso' => '1']);
            session(['usuario' => 'administrador']);

            return redirect('reparaciones');
        }

    }else{
        return redirect('login');
    };

});