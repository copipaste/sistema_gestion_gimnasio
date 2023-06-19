<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Pago extends Model
{
    use HasFactory;
    protected $table = 'tipo_pagos';

    protected $fillable = [
        'nombre',

    ];
}
