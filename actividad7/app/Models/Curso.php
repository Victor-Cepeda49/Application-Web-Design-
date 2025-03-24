<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    
    protected $fillable = ['clave', 'nombre', 'portada', 'contenido', 'material_didactico', 'kit_robotica_id'];

    public function kit() {
        return $this->belongsTo(KitRobotica::class);
    }

    public function grupos() {
        return $this->belongsToMany(Grupo::class, 'curso_grupo');
    }
}
