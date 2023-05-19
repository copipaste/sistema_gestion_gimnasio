<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'especialidad_id', 'id');
    }

    protected $fillable = [
        'nombre',
        'apellido',
        'cedula' ,
        'telefono' ,
        'direccion' ,
        'email',
        'especialidad_id' ,
        'fecha_ingreso'
    ];
}
