<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;



    public $timestamps = false;
    // protected $table = 'periodo'; esto de aca se ocupa para especificar que tablas va a utilizar 
}
