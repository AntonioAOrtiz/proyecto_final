<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
</head>
<body>
    <p>Hola, {{ $hoja_factura->nombre }}.</p>
    <p>Le adjuntamos la factura correspondiente a la reparación de su {{ $hoja_factura->producto }} {{ $hoja_factura->marca }} {{ $hoja_factura->modelo }}.</p>
    
    <p>Muchas gracias y un cordial saludo.</p>
    <p>Atentamente,</p>
    <p>iBanana.</p>
</body>
</html>