<?php

namespace App\Http\Controllers;

use App\Presupuesto;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use QrCode;
use App\Http\Controllers\facturas;

class PresupuestoController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set('Europe/Madrid');

        $id_ = DB::table('presupuestos')->insertGetId([
            'nombre' => $request->input('nombre'),
            'dni' => $request->input('dni'),
            'movil' => $request->input('movil'),
            'email' => $request->input('email'),
            'direccion' => $request->input('direccion'),
            'producto' => $request->input('producto'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'nserie' => $request->input('nserie'),
            'averia_reportada' => $request->input('averia_reportada'),
            'componente' => $request->input('vC'),
            'importe' => $request->input('vI'),
            'cantidad' => $request->input('vCn'),
            'created_at' => date("Y-m-d H:i:s")
        ]);

        session(['articulo' => $id_]);

        return redirect('listado-de-presupuestos');
    }

    public function listado_presupuestos(Request $request)
    {

        if ($request->session()->exists('permiso')) {

        $presupuestos = DB::table('presupuestos')->get();

        $mensaje = "";

        if($request->session()->has('articulo')){
            $mensaje = session('articulo');
            $request->session()->forget('articulo');
        }

        return view('listado_presupuestos',compact('presupuestos','mensaje'));

    }else{
        return redirect('login');
    }
    }

    public function todos_los_presupuestos(Request $request)
    {

        if ($request->session()->exists('permiso')) {

        $presupuestos = DB::table('presupuestos')->get();

        $mensaje = "";

        if($request->session()->has('articulo')){
            $mensaje = session('articulo');
            $request->session()->forget('articulo');
        }

        return view('listado_presupuestos',compact('presupuestos','mensaje'));

    }else{
        return redirect('login');
    }
    }

    public function ver_presupuesto($id)
    {

        $hoja_presupuesto = DB::table('presupuestos')->where('id',$id)->first();
        $pdf = app('dompdf.wrapper');
        

        Carbon::setLocale('es');
        $fecha = Carbon::parse($hoja_presupuesto->created_at);
        $fecha = $fecha->format('d') . '/' . $fecha->format('m') . '/' . $fecha->format('Y');

        QrCode::generate("www.nigmacode.com", 'qrs/qr' . $hoja_presupuesto->id . '.svg');

        $pdf->loadView('presupuesto_pdf', compact('hoja_presupuesto','fecha'));


        return $pdf->stream('hoja-de-presupuesto-' . $id . '.pdf');
    }

    public function ver_factura($id)
    {

        $hoja_presupuesto = DB::table('presupuestos')->where('id',$id)->first();
        $pdf = app('dompdf.wrapper');

        Carbon::setLocale('es');
        $fecha = Carbon::parse($hoja_presupuesto->created_at);
        $fecha = $fecha->format('d') . '/' . $fecha->format('m') . '/' . $fecha->format('Y');

        QrCode::generate("www.nigmacode.com", 'qrs/qr' . $hoja_presupuesto->id . '.svg');

        $pdf->loadView('factura_presupuesto_pdf', compact('hoja_presupuesto','fecha'));
        
        return $pdf->download('hoja-de-factura-' . $id . '.pdf');
    }

    public function editar($id)
    {
        $presupuestos = DB::table('presupuestos')->where('id',$id)->first();

        return view('Editar.editar_presupuestos',compact('presupuestos'));
    }

    public function actualizar(Request $request)
    {

        if ($request->session()->exists('permiso')) {

        DB::table('presupuestos')->where('id',$request->input('id'))->update([
            'nombre' => $request->input('nombre'),
            'dni' => $request->input('dni'),
            'movil' => $request->input('movil'),
            'email' => $request->input('email'),
            'direccion' => $request->input('direccion'),
            'producto' => $request->input('producto'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'nserie' => $request->input('nserie'),
            'averia_reportada' => $request->input('averia_reportada'),
            'componente' => $request->input('vC'),
            'importe' => $request->input('vI'),
            'cantidad' => $request->input('vCn')
        ]);

        return redirect('listado-de-presupuestos');

        }else{
            return redirect('login');
        }
    }

    public function eliminar($id)
    {
        DB::table('presupuestos')->where('id',$id)->delete();
        return redirect('listado-de-presupuestos');
    }

    public function clonar($id){
        $presupuestos = DB::table('presupuestos')->where('id',$id)->first();

        $id_factura_ = DB::table('facturas')->insertGetId([
            'nombre' => $presupuestos->nombre,
            'dni' => $presupuestos->dni,
            'movil' => $presupuestos->movil,
            'email' => $presupuestos->email,
            'direccion' => $presupuestos->direccion,
            'producto' => $presupuestos->producto,
            'marca' => $presupuestos->marca,
            'modelo' => $presupuestos->modelo,
            'nserie' => $presupuestos->nserie,
            'averia_reportada' => $presupuestos->averia_reportada,
            'componente' => $presupuestos->componente,
            'importe' => $presupuestos->importe,
            'cantidad' => $presupuestos->cantidad,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        session(['articulo' => $id_factura_]);

        ver_factura($id);

        return redirect('listado-de-presupuestos');
    }

}