<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Periodo extends Model
{
    use HasFactory,LogsActivity;

    protected $fillable = [
        'desde',
        'hasta',    
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_periodo');
    }
    // public $timestamps = false;
    // protected $table = 'periodo'; esto de aca se ocupa para especificar que tablas va a utilizar 
}
