<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use QrCode;

class pedidos extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set('Europe/Madrid');

        $id_ = DB::table('pedidos')->insertGetId([
            'componente' => $request->input('componente'),
            'unidad' => $request->input('unidad'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'color' => $request->input('color'),
            'movil' => $request->input('movil'),
            'fianza' => $request->input('fianza'),
            'precio_final' => $request->input('precio_final'),
            'created_at' => date("Y-m-d H:i:s")
        ]);

        session(['articulo' => $id_]);

        return redirect('listado-de-pedidos');
    }

    public function listado_pedidos(Request $request)
    {

        if ($request->session()->exists('permiso')) {

        $pedidos = DB::table('pedidos')->get();

        $mensaje = "";

        if($request->session()->has('articulo')){
            $mensaje = session('articulo');
            $request->session()->forget('articulo');
        }

        return view('listado_componentes',compact('pedidos','mensaje'));

    }else{
        return redirect('login');
    }
    }

    public function editar($id)
    {
        $pedidos = DB::table('pedidos')->where('id',$id)->first();

        return view('Editar.editar_componentes',compact('pedidos'));
    }

    public function actualizar(Request $request)
    {

        if ($request->session()->exists('permiso')) {

        DB::table('pedidos')->where('id',$request->input('id'))->update(['componente' => $request->input('componente'),
            'unidad' => $request->input('unidad'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'estado' => $request->input('estado'),
            'color' => $request->input('color'),
            'movil' => $request->input('movil'),
            'fianza' => $request->input('fianza'),
            'precio_final' => $request->input('precio_final')]);

        return redirect('listado-de-pedidos');

        }else{
            return redirect('login');
        }
    }

    public function eliminar($id)
    {
        DB::table('pedidos')->where('id',$id)->delete();
        return redirect('listado-de-pedidos');
    }

}
