<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario_Disciplina extends Model
{
    use HasFactory;
    protected $table = 'horario_disciplinas';

    protected $fillable = [
        'id_disciplina',
        'dia',
        'hora_inicio',
        'hora_fin',
    ];
}
