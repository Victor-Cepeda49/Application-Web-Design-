<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    
    protected $fillable = ['usuario_id', 'grupo_id'];

    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }

    public function grupo() {
        return $this->belongsTo(Grupo::class);
    }
}
