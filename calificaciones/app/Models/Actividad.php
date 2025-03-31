<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    
    protected $table = 'actividades';
    
    protected $fillable = [
        'asignatura_id',
        'tipo',
        'nombre',
        'calificacion',
        'fecha',
        'comentario'
    ];
    
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
}
