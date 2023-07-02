<?php

namespace App\Http\Controllers;

use App\Models\Membresia;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;


class PdfController extends Controller
{
    public function generatePDF(Request $request, $id)
    {
        // Crea una instancia de Dompdf
        $dompdf = new Dompdf();
        $cliente = User::findOrFail($id);
        
        $membresias = Membresia::all();
        
        // Obtiene el contenido HTML que deseas convertir a PDF
        $html = view('pdf.template')->with('cliente',$cliente)->with('membresias',$membresias)->render();

        // Carga el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A6', 'portrait');
        // Renderiza el contenido HTML en PDF
        $dompdf->render();

        // Genera el PDF y lo muestra en el navegador para descarga
        return $dompdf->stream('archivo.pdf', ['Attachment' => false]);
    }

    public function imprimirNotaConDatos(Request $request, $id)
    {
        // $cliente = User::findOrFail($id);
        // $pdf = PDF::loadView('pdf.template', compact('cliente'));
        // return $pdf->stream('nota.pdf');
    }
}

