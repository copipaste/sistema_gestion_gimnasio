<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor_Disciplina extends Model
{
    use HasFactory;
    protected $table = 'instructor_disciplinas';

    protected $fillable = [
        'id_instructor',
        'id_disciplina',
    ];
    
}
