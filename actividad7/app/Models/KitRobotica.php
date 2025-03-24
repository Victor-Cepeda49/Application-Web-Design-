<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitRobotica extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre'];

    public function cursos() {
        return $this->hasMany(Curso::class);
    }
}
