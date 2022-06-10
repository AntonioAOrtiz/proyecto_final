<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use QrCode;

class ClienteController extends Controller
{
    public function index(Request $request)
    {

        if ($request->session()->exists('permiso')) {

        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $password = "";
        //Reconstruimos la contraseña segun la longitud que se quiera
        for($i=0;$i<10;$i++) {
           //obtenemos un caracter aleatorio escogido/la cadena de caracteres
           $password .= substr($str,rand(0,62),1);
        }

        // 2021-09-18 23:46:37

        date_default_timezone_set('Europe/Madrid');

        $id_ = DB::table('reparaciones')->insertGetId([
            'nombre' => $request->input('nombre'),
            'dni' => $request->input('dni'),
            'movil' => $request->input('movil'),
            'email' => $request->input('email'),
            'producto' => $request->input('producto'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'nserie' => $request->input('nserie'),
            'pin' => $request->input('pin'),
            'contraseña' => $request->input('password'),
            'clave_codigo_barras' => $password,
            'presupuesto' => $request->input('presupuesto'),
            'averia_reportada' => $request->input('averia_reportada'),
            'cierre_averia' => $request->input('cierre_averia'),
            'created_at' => date("Y-m-d H:i:s")
        ]);

        session(['articulo' => $id_]);

        return redirect('listado-de-clientes');

    }else{
        return redirect('login');
    }
    }

    public function listado(Request $request)
    {

        if ($request->session()->exists('permiso')) {

        $clientes = DB::table('reparaciones')->get();

        $mensaje = "";

        if($request->session()->has('articulo')){
            $mensaje = session('articulo');
            $request->session()->forget('articulo');
        }

        return view('listado',compact('clientes','mensaje'));

        }else{
            return redirect('login');
        }

    }

    public function abiertas(Request $request)
    {

        if ($request->session()->exists('permiso')) {

        $clientes = DB::table('reparaciones')->where('estado',0)->get();

        $mensaje = "";

        if($request->session()->has('articulo')){
            $mensaje = session('articulo');
            $request->session()->forget('articulo');
        }

        return view('listado',compact('clientes','mensaje'));

        }else{
            return redirect('login');
        }
    }

    public function todas_las_reparaciones(Request $request)
    {

        if ($request->session()->exists('permiso')) {

        $clientes = DB::table('reparaciones')->get();

        $mensaje = "";

        if($request->session()->has('articulo')){
            $mensaje = session('articulo');
            $request->session()->forget('articulo');
        }

        return view('listado',compact('clientes','mensaje'));

    }else{
        return redirect('login');
    }
    }


    public function ver($id)
    {

        $hoja = DB::table('reparaciones')->where('id',$id)->first();
        $pdf = app('dompdf.wrapper');

        Carbon::setLocale('es');
        $fecha = Carbon::parse($hoja->created_at);
        $fecha = $fecha->format('d') . '/' . $fecha->format('m') . '/' . $fecha->format('Y');

        QrCode::generate("www.nigmacode.com", 'qrs/qr' . $hoja->id . '.svg');

        $pdf->loadView('recibo', compact('hoja','fecha'));

        return $pdf->stream('hoja-de-reparacion-' . $id . '.pdf');
    }

    public function editar($id)
    {

        $reparacion = DB::table('reparaciones')->where('id',$id)->first();

        return view('Editar.editar_reparaciones',compact('reparacion'));
    }

    public function actualizar(Request $request)
    {
        if ($request->session()->exists('permiso')) {
        
        DB::table('reparaciones')->where('id',$request->input('id'))->update([
            'nombre' => $request->input('nombre'),
            'dni' => $request->input('dni'),
            'movil' => $request->input('movil'),
            'email' => $request->input('email'),
            'producto' => $request->input('producto'),    
            'estado' => $request->input('estado'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'nserie' => $request->input('nserie'),
            'pin' => $request->input('pin'),
            'contraseña' => $request->input('password'),
            'presupuesto' => $request->input('presupuesto'),
            'averia_reportada' => $request->input('averia_reportada'),
            'cierre_averia' => $request->input('cierre_averia')
        ]);

        return redirect('listado-de-clientes');
    
    }else{
        return redict('login');
    }
}

    public function eliminar($id)
    {

        DB::table('reparaciones')->where('id',$id)->delete();
        return redirect('listado-de-clientes');
    }

    


}
