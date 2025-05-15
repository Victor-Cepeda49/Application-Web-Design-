<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personaje extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'imagen', 'descripcion'];

    public function peliculas()
    {
        return $this->belongsToMany(Pelicula::class);
    }
}
