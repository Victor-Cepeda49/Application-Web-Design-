<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre', 'email', 'password', 'rol'];

    public function estudiante() {
        return $this->hasOne(Estudiante::class);
    }
}
