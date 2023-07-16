<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Horario_Disciplina extends Model
{
    use HasFactory,LogsActivity;
    protected $table = 'horario_disciplinas';

    protected $fillable = [
        'id_disciplina',
        'dia',
        'hora_inicio',
        'hora_fin',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }
}
