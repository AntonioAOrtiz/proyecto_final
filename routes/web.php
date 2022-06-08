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
Route::post('dar-de-alta', 'ClienteController@index');

Route::get('listado-de-clientes', 'ClienteController@abiertas');

//Pedidos
Route::post('pedir-pedido', 'PedidoController@index');

Route::get('listado-de-pedidos', 'PedidoController@listado_pedidos');

//Presupuestos
Route::post('crear-presupuesto', 'PresupuestoController@index');

Route::get('listado-de-presupuestos', 'PresupuestoController@listado_presupuestos');

//Facturas
Route::post('crear-factura', 'FacturaController@index');

Route::get('listado-de-facturas', 'FacturaController@listado_facturas');

Route::get('enviar-factura', 'FacturaController@sendEmail');

//Listado de Reparaciones
Route::get('ver-todas-reparaciones', 'ClienteController@todas_las_reparaciones');

Route::get('documento/{id}', 'ClienteController@ver');

Route::get('editar-reparacion/{id}', 'ClienteController@editar');

Route::post('actualizar-reparacion', 'ClienteController@actualizar');

Route::get('eliminar/{id}', 'ClienteController@eliminar');

//Listado de Pedidos
Route::get('editar-pedido/{id}', 'PedidoController@editar');

Route::post('actualizar-pedido', 'PedidoController@actualizar');

Route::get('eliminar-pedido/{id}', 'PedidoController@eliminar');

//Listado de Presupuestos
Route::get('ver-todos-presupuestos', 'PresupuestoController@todos_los_presupuestos');

Route::get('documento-presupuesto/{id}', 'PresupuestoController@ver_presupuesto');

Route::get('documento-factura-presupuesto/{id}', 'PresupuestoController@ver_factura');

Route::get('editar-presupuesto/{id}', 'PresupuestoController@editar');

Route::post('actualizar-presupuesto', 'PresupuestoController@actualizar');

Route::get('eliminar-presupuesto/{id}', 'PresupuestoController@eliminar');

//Listado de Facturas
Route::get('documento-factura/{id}', 'FacturaController@ver_factura');

Route::get('editar-factura/{id}', 'FacturaController@editar');

Route::post('actualizar-factura', 'FacturaController@actualizar');

Route::get('eliminar-factura/{id}', 'FacturaController@eliminar');

// Loguear usuario

Route::get('comprobar-usuario', function (Request $request) {

    

    $comandas = DB::table('usuarios')
    ->where('usuario',$request->input('usuario'))
    ->where('password',$request->input('password'))
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