<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;  

class Promocion extends Model
{
    use HasFactory,LogsActivity;

    protected $table = 'promocions';
    protected $fillable = [
        'nombre',
        'dias_regalo',
        'porcentaje_descuento',
        'descripcion',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }
}
