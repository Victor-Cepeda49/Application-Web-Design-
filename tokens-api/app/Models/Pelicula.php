<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelicula extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'clasificacion', 'fecha_estreno', 'resena', 'temporada'];

    public function personajes()
    {
        return $this->belongsToMany(Personaje::class);
    }
}
