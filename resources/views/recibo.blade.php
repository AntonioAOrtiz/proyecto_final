<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Hoja de reparación {{ $hoja->id }}</title>
		<!-- Estilos en línea necesarios para que puedan ser procesados por DomPDF -->
		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 12px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}
			.condiciones {
				text-align: left;
				font-size: 6px;
				margin: 0;
				padding: 0;
				line-height : 15px;
			}
			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 10px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			.invoice-box .condiciones{
				margin-top: 10px;
			}

			.invoice-box .firma_cliente{
				text-align: right;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}



			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				
				<tr class="top">
					<td colspan="2">
						<table>
					
							<tr>
								<td class="title">
									<img src="{{ public_path('ibanana_factura.png') }}" style="width: 70%; max-width: 270px" />
								</td>

								<td>
									Reparación Nº: {{ $hoja->id }}<br />
									Fecha de Entrada: {{ $fecha }}
					
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									www.ibanana.es<br />
									Avenida Leon Herrero, nº:16 Local C14<br/>
                                    San Fernando-Cádiz-CP: 11100<br>
                                    TLF: 956949710
								</td>

								<td>
								Nombre de Cliente:	{{ $hoja->nombre }}<br />
								D.N.I:	{{ $hoja->dni }}<br />
								Teléfono:	{{ $hoja->movil }}<br/>
                                Email:    {{ $hoja->email }}
								</td>
							</tr>
						</table>
					</td>
				</tr>
<tr class="heading">
					<td colspan="2">
						<table>
							<tr>
					<td>Información del dispositivo.</td>
					<td>Presupuesto: <b>{{ $hoja->presupuesto }} €</b></td>
				</tr>
</table></td>

				<tr class="information">
					<td colspan="2">
						<table>

							<tr>
					<td>
                    Producto: <b>{{ $hoja->producto }}  | </b>
                    Modelo: <b>{{ $hoja->modelo }}  | </b>
                    Marca: <b>{{ $hoja->marca }} </b>
                    <br/>Número de serie: <b>{{ $hoja->nserie }} | </b>
                    Pin: <b>{{ $hoja->pin }} | </b>
                    Contraseña: <b>{{ $hoja->contraseña }}</b>
                    
                    <br/>Avería: <b>{{ $hoja->averia_reportada }}</b>
                    
                </td>

                <td><img src="patron.png" class="text-center" style="width: 80%; max-width: 80px" />
					</td>
					
				</tr>
		</table>
	</td>
</tr>
<tr class="heading">
					<td colspan="2">
						<table>
							<tr>
					<td>Condiciones del Servicio (Leer atentamente).</td>

				</tr>
</table>
<div class="condiciones">

<b>1. No nos hacemos responsable de los datos que contengan el móvil, recomendamos que haga una copia de seguridad antes de dejar su terminal para la reparación.<br></b>
 <b>2. La garantía de las reparaciones tienen un plazo de 3 meses siempre y cuando no se produzcan:<br></b>
 2.a - Daños causado por uso inadecuado<br>
 2.b - Cualquier desmontaje, alteración o modificación.<br>
 2.c - Uso inapropiado del equipo.<br>
 2.d - Defectos causado por colpes, rayaduras y humedades.<br>
<b>3. Todas las reparaciones están garantizadas por tres meses de garantía, POR LA MISMA AVERÍA.<br></b>
<b>4. No recogemos teléfonos en garantía sin la correspondiente Factura.<br></b>
<b>5. No nos hacemos responsable de ninguna tarjeta que pueda traer el terminal.<br></b>
<b>6. Para recoger el terminal es obligatorio presentar la orden de reparación o D.N.I<br></b>

<b>INFORMACIÓN Y CONSENTIMIENTO DE TRATAMIENTO DE DATOS PERSONALES DE CLIENTES<br></b> 
ANA ISABEL OJEDA QUIÑONES CIF/NIF 75770341S responsable del tratamiento informa, de
conformidad con lo establecido en el REGLAMENTO (UE) 2016/679 y la Ley Orgánica 3/2018 de
protección de datos, que sus datos de carácter personal son tratados con la finalidad de:<br>
<b>- Prestar un servicio o suministrar un producto.<br></b>
<b>- Facturar un producto o servicio contratado.<br></b>
<b>- Cumplir con las obligaciones legales impuestas a la actividad.<br></b>

Podrá ejercer sus derechos de acceso, rectificación, limitación de tratamiento, supresión, portabilidad y
oposición al tratamiento de sus datos de carácter personal así como revocar los consentimientos que
en su caso haya prestado u obtener más información, dirigiendo su petición a IBANANA@IBANANA.ES
/ AVD LEON HERRERO No16, CC PLAZA, 11100, SAN FERNANDO (CáDIZ).
Marque si presta su consentimiento expreso para:<br>
[ ] - Enviar publicidad postal o por correo electrónico sobre nuestros servicios/productos.<br>
[ ] - Acepto haber leído todas las condiciones del servicio.
               </div>
			   
	
	</div>
	

		</table>
		
			<table cellpadding="0" cellspacing="0">
				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>Sello Empresa</td>					
									<img src="{{ public_path('sello.png') }}" style="width: 140%; max-width: 140px" />
								
								<td class="firma_cliente">
								Firma Cliente
								</td>
							</tr>
						</table>
					</td>
				</tr>
</body>
</html>
