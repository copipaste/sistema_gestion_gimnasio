<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Membresia extends Model
{
    use HasFactory,LogsActivity;
    protected $primaryKey = 'id';
  
    protected $table = 'membresias';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'duracion',
    ];
    
    //este es el cambio que hice
    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class, 'englobas', 'id_membresia', 'id_disciplina');
    }

    
    //este es el cambio que hice

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }
}
