<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'dias_regalo',
        'porcentaje_descuento',
        'descripcion',
    ];
}
