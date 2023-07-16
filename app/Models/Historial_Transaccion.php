<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Historial_Transaccion extends Model
{
    use HasFactory,LogsActivity;
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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }


    
}
