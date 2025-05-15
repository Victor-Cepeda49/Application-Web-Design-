<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'fecha_hora',
        'cuerpo',
        'clasificacion',
    ];
}
