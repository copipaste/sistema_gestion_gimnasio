<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial_Transaccion extends Model
{
    use HasFactory;
    protected $table = 'historial_transaccions';

    protected $fillable = [
        'id_cliente',
        'monto',
        'fecha_transaccion',
        'descripcion',
        'periodo_inicio',
        'periodo_fin',
        'membresia_adquirida',
        'cod_pago',   
        'id_promocion',
        'id_tramitador',
    ];
}
