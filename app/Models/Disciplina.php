<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Disciplina extends Model
{
    use HasFactory,LogsActivity;

    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'capacidad',
    ];

    public function membresias()
    {
        return $this->belongsToMany(Membresia::class, 'englobas', 'Id_disciplina', 'Id_membresia');
    }
    public function horario_disciplinas()
    {
        return $this->hasMany(Horario_disciplina::class, 'id_disciplina', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }
}
