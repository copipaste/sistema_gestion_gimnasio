<?php

namespace App\Http\Controllers;

use App\Models\Historial_Transaccion;
use App\Models\User;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePDF(Request $request, $id)
    {
        // Crea una instancia de Dompdf
        $dompdf = new Dompdf();
        $cliente = User::findOrFail($id);
        $historial_transaccion = Historial_Transaccion::where('id_cliente', $id)
            ->latest('fecha_transaccion')
            ->first();

        // Obtiene el contenido HTML que deseas convertir a PDF
        $html = view('pdf.template', compact('cliente', 'historial_transaccion'))->render();

        // Carga el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Configura el tamaño y la orientación del papel
        $dompdf->setPaper('A6', 'portrait');

        // Renderiza el contenido HTML en PDF
        $dompdf->render();

        // Genera el PDF y lo muestra en el navegador para descarga
        // return $dompdf->stream('archivo.pdf', ['Attachment' => false]);

        $dompdf->stream('archivo.pdf', ['Attachment' => true]);
        exit;
    }
}


