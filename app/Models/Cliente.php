<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Cliente extends Model
{
    use HasFactory,LogsActivity;
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
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }
}
