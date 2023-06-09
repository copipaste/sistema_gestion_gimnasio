<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    use HasFactory;

    protected $table = 'membresia';
    //este es el cambio que hice
        public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class, 'engloba', 'idMembresia', 'idDisciplina');
    }
    //este es el cambio que hice
}
