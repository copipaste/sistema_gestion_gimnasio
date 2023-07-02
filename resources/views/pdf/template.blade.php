<!DOCTYPE html>
<html>
<head>
    <title>Gimnasio Leon Z</title>
    <!-- Incluye los archivos CSS de AdminLTE -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <style>
        /* Estilos personalizados para el tamaño de hoja H6 */
        body {
            width: 70mm;
            height: 148mm;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .invoice-details {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .invoice-details p {
            margin: 0;
        }
        
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        .invoice-table th,
        .invoice-table td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        
        .footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Gimnasio Leon Z</h2>
    </div>
    
    
    <div class="invoice-details">

        <p><strong>Número de factura: </strong> 123456</p>
        <p><strong>Cliente: </strong> {{ $cliente->nombre }} {{ $cliente->apellido }}</p>
        <p><strong>Plan:</strong> {{$membresias->where('id', $cliente->id_membresia)->first()->nombre}}</p>
        <p><strong>Fecha: </strong> {{ date('Y-m-d') }}</p>
        
        <p><strong>Dirección: </strong> Av. 6 de Agosto</p>
        <p><strong>Monto pagado: </strong>{{$membresias->where('id', $cliente->id_membresia)->first()->precio}}</p>
    </div>
    
    
    <div class="footer">
        <p>Gracias por su preferencia</p>
    </div>
</body>
</html>
