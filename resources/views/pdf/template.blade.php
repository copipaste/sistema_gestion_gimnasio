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
            position: absolute; /* Agrega esta línea */
            bottom: 20px; /* Ajusta la distancia del pie de página */
            left: 0; /* Asegura que esté alineado a la izquierda */
            right: 0; /* Asegura que esté alineado a la derecha */
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Gimnasio Leon Z</h2>
    </div>
    
    
    <div class="invoice-details">

        {{-- <p><strong>Número de factura: </strong> 123456</p> --}}
        <p><strong>Cliente: </strong> {{ $cliente->nombre }} {{ $cliente->apellido }}</p>
        {{-- <p><strong>Plan:</strong> {{$membresias->where('id', $cliente->id_membresia)->first()->nombre}}</p> --}}
        <p><strong>Dirección: </strong> Av. 6 de Agosto</p>
        <p><strong>Fecha de inicio: </strong> {{$historial_transaccion->periodo_inicio}}</p>
        <p><strong>Fecha de fin: </strong> {{$historial_transaccion->periodo_fin}}</p>
        <p><strong>Membresia: </strong> {{$historial_transaccion->membresia_adquirida}}</p>
        <p><strong>Monto pagado: </strong>{{$historial_transaccion->monto}}</p>

        
    </div>
    
    <div class="footer">
        <p>Gracias por su preferencia</p>
        <p><strong>Fecha: </strong> {{ date('Y-m-d') }}</p>
    </div>
</body>
</html>
