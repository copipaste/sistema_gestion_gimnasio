<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'sexo',
        'email',
        'cedula',
        'peso',
        'telefono_emergencia',
        'direccion',
        'fecha_ingreso',
        'idTarjeta',
        'id_usuario'
    ];
    // protected $hidden = [
    //     'password'
    // ]; 
}
