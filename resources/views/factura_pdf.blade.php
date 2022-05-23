<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja de factura {{ $hoja_factura->id }}</title>
    <style>
    
        body{
            border-bottom: 2px solid #3366FF;
        }

        .invoice-box{
            padding: 30px;
            border-top: 2px solid #3366FF;
            font-size: 12px;
			line-height: 24px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            
        }

        .invoice-box table.top {
            margin-bottom: 20px;
        }

        .invoice-box table.info_empresa {
            font-weight: bold;
            float:left;
        }

        .invoice-box table.info_empresa tr td.titulo{
            font-size: 18px;
            padding-bottom: 15px;
        }

        .derecha table.info_importe{
            width: 100%;
            border-collapse: collapse;
            vertical-align: middle;
            margin-bottom: 40px;
        }



        .invoice-box table.info_importe tr td:nth-child(n+2){
            text-align: center;
        }

        .invoice-box table tr.cabecera{
            text-align: left;
            font-weight: bold;
            background-color:#3366FF;
            color: white;
        }

        .invoice-box table.info_cliente{
            vertical-align: middle;
            margin-bottom: 40px;
            
        }

        .invoice-box table.agradecimiento{
            vertical-align: middle;
            text-align: left;
        }

        .derecha{
            display:inline;
            float:right;
        }

        /*.invoice-box .derecha table.info_importe tr td{
            
            border-style: dotted;
        }

        .invoice-box .derecha table.info_importe tr td:first-child{
            border-left: 0px solid;
        }
        
        .invoice-box .derecha table.info_importe tr td:last-child{
            border-right: 0px solid;
        }*/

        

    </style>
</head>

<body>

    <?php
        $componentes = $hoja_factura->componente;
        $cantidades = $hoja_factura->cantidad;
        $precios = $hoja_factura->importe;
        $id = $hoja_factura->id;
        $numero_factura = $id + 24670;

        if(strpos($componentes,"/") == true){
            $array_componentes = explode("/", $componentes);
        }

        if(strpos($cantidades,"/") == true){
            $array_cantidades = explode("/", $cantidades);
        }

        if(strpos($precios,"/") == true){
            $array_precios = explode("/", $precios);
        }

    ?>

    <div class="invoice-box">
        <table class="top">
            <tr>
                <td class="title">
                <img src="{{ public_path('logo.jpg') }}" style="width: 100%; max-width: 300px" />
                </td>
            </tr>
        </table>
        <table class="info_empresa">    
            <tr><td class="titulo">FACTURA</td></tr>
            <tr><td>Ana Isabel Ojeda</td></tr>
            <tr><td>Quiñones</td></tr>
            <tr><td>75770341S</td></tr>
            <tr><td>956949710</td></tr>
            <tr><td>iBanana@iBanana.es</td></tr>
            <tr><td></td></tr>
            <tr><td>Avenida Almirante León</td></tr>
            <tr><td>Herrero 16 C.C. Plaza</td></tr>
            <tr><td>Local C14 11100</td></tr>
            <tr><td>San Fernando, Cádiz</td></tr>
          
        </table>

        <div class="derecha">
            <div>
            <table class="info_cliente">
                <tr><td>{{ $hoja_factura->nombre }}</td></tr>
                <tr><td>{{ $hoja_factura->dni }}</td></tr>
                <tr><td>Fecha: {{ $hoja_factura->created_at }}</td></tr>
                <tr><td>Título del proyecto: {{ $hoja_factura->marca }} {{ $hoja_factura->modelo }}</td></tr>
                <tr><td>Producto: {{ $hoja_factura->producto }}</td></tr>
                <tr><td>Numero IMEI: {{ $hoja_factura->nserie }}</td></tr>
                <tr><td>Número de factura: {{ $numero_factura }}</td></tr>
                
            </table>
            </div>

            <div>
            <table class="info_importe">
                <tr class="cabecera">
                    <td colspan="3">Descripción</td>
                    <td>Cantidad</td>
                    <td>Precio</td>
                    <td>Importe</td>
                </tr>
                @php
                    $contador_componente = 0;
                    $contador_cantidad = 0;
                    $contador_precio = 0;
                    $contador_errores = 0;
                    $cantidad_entera = 0;
                    $importe = 0;
                    $base = 0;
                    $importe_total = 0;
                @endphp
            
                @foreach ($array_componentes as $componente)
                    <tr>
                        <td colspan="3">{{ $componente }}</td>
                @foreach ($array_cantidades as $cantidad)
                    <?php
                        $cantidad_int = intval($cantidad);
                    ?>
                    @if ($contador_cantidad == $contador_componente)
                        <td>{{ $cantidad_int }}</td>
                        @php
                            $cantidad_entera = $cantidad_int
                        @endphp
                    @endif
                    @php($contador_cantidad++)  
                @endforeach
                @foreach ($array_precios as $precio)
                    <?php
                        $precio_float = floatval($precio);
                    ?>
                    @if ($contador_precio == $contador_componente)
                        @php($precio_sin_iva = $precio_float/1.21)
                        @php($precio_sin_iva = number_format($precio_sin_iva,2))
                        <td>{{ $precio_sin_iva }} €</td>
                            
                            @php($importe = $precio_float * $cantidad_entera)
                            @php($importe_sin_iva = $importe/1.21)
                            @php($importe_sin_iva = number_format($importe_sin_iva,2))
                            @php($base += $importe_sin_iva)
                            @php($importe_total += $importe)
                        <td> {{ $importe_sin_iva }} €</td>
                    
                    @endif
                    @php($contador_precio++)   
                @endforeach
                @php($contador_componente++)
                @php($contador_cantidad = 0)
                @php($contador_precio = 0)

                        
                        
                    </tr>
                    
                @endforeach
                    
                



                
                <tr>
                    <td colspan="3"></td>
                    <td></td>
                    <td>Base</td>
                    @php($base = number_format($base,2))
                    <td class="base">{{ $base }} €</td>
                </tr>

                    @php($impuesto = $importe_total-$base)
                    @php($impuesto = number_format($impuesto,2))

                <tr>
                    <td colspan="3"></td>
                    <td>Impuesto</td>
                    <td>21%</td>
                    <td class="impuesto">{{ $impuesto }} €</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td></td>
                    <td style="font-weight: bold">Total</td>
                    @php($importe_total = number_format($importe_total,2))
                    <td class="importe_total" style="font-weight: bold">{{ $importe_total }} €</td>
                </tr>
                
            </table>
            <div>
            <table class="agradecimiento">
                <tr><td>Agradecemos su confianza y colaborar en su proyecto.</td></tr>
                <tr><td>Atentamente,</td></tr>
                <tr><td>iBanana.es</td></tr>
            </table>
        </div>  
        
    </div>
    
    
    

</body>
</html>