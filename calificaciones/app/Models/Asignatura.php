<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre', 'profesor', 'semestre'];
    
    public function actividades()
    {
        return $this->hasMany(Actividad::class);
    }
}
