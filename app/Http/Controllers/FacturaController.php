<?php

namespace App\Http\Controllers;

use App\Factura;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use QrCode;
use Mail;

class FacturaController extends Controller
{

    public function index(Request $request)
    {
        date_default_timezone_set('Europe/Madrid');

        $id_ = DB::table('facturas')->insertGetId([
            'nombre' => $request->input('nombre'),
            'dni' => $request->input('dni'),
            'movil' => $request->input('movil'),
            'email' => $request->input('email'),
            'direccion' => $request->input('direccion'),
            'producto' => $request->input('producto'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'nserie' => $request->input('nserie'),
            'componente' => $request->input('vC'),
            'importe' => $request->input('vI'),
            'cantidad' => $request->input('vCn'),
            'created_at' => date("Y-m-d H:i:s")
        ]);

        session(['articulo' => $id_]);

        return redirect('listado-de-facturas');
    }

    public function listado_facturas(Request $request)
    {

        if ($request->session()->exists('permiso')) {

        $facturas = DB::table('facturas')->get();

        $mensaje = "";

        if($request->session()->has('articulo')){
            $mensaje = session('articulo');
            $request->session()->forget('articulo');
        }

        return view('listado_facturas',compact('facturas','mensaje'));

    }else{
        return redirect('login');
    }
    }

    public function ver_factura($id)
    {

        $hoja_factura = DB::table('facturas')->where('id',$id)->first();
        $pdf = app('dompdf.wrapper');

        Carbon::setLocale('es');
        $fecha = Carbon::parse($hoja_factura->created_at);
        $fecha = $fecha->format('d') . '/' . $fecha->format('m') . '/' . $fecha->format('Y');

        QrCode::generate("www.nigmacode.com", 'qrs/qr' . $hoja_factura->id . '.svg');

        $pdf->loadView('factura_pdf', compact('hoja_factura','fecha'));

        return $pdf->stream('hoja-de-factura-' . $id . '.pdf');
    }

    public function editar($id)
    {
        $facturas = DB::table('facturas')->where('id',$id)->first();

        return view('Editar.editar_facturas',compact('facturas'));
    }

    public function actualizar(Request $request)
    {

        if ($request->session()->exists('permiso')) {

        DB::table('facturas')->where('id',$request->input('id'))->update([
            'nombre' => $request->input('nombre'),
            'dni' => $request->input('dni'),
            'movil' => $request->input('movil'),
            'email' => $request->input('email'),
            'direccion' => $request->input('direccion'),
            'producto' => $request->input('producto'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'nserie' => $request->input('nserie'),
            'componente' => $request->input('vC'),
            'importe' => $request->input('vI'),
            'cantidad' => $request->input('vCn')
        ]);

        return redirect('listado-de-facturas');

        }else{
            return redirect('login');
        }
    }

    public function eliminar($id)
    {
        DB::table('facturas')->where('id',$id)->delete();
        return redirect('listado-de-facturas');
    }

    public function sendEmail($id)
    {
        $hoja_factura = DB::table('facturas')->where('id',$id)->first();
        $pdf = app('dompdf.wrapper');

        Carbon::setLocale('es');
        $fecha = Carbon::parse($hoja_factura->created_at);
        $fecha = $fecha->format('d') . '/' . $fecha->format('m') . '/' . $fecha->format('Y');
        
        $pdf->loadView('factura_pdf', compact('hoja_factura','fecha'));
        
        Mail::send('emails.email', $data, function ($message,$pdf) {
            $message->from('ibanana@ibanana.es', 'Laravel');
         
            $message->to('aortgar599@g.educaand.es');

            $message->subject('Factura iBanana');

            $message->attachData($pdf->output(), 'hoja-de-factura-' . $id . '.pdf');
        });

        return redirect('listado-de-facturas');
    }
}