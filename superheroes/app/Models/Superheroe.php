<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superheroe extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre_real',
        'nombre_superheroe',
        'foto_url',
        'informacion_adicional'
    ];
}
