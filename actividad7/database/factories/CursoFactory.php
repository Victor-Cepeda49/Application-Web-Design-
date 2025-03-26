<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Curso;
use App\Models\KitRobotica;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    protected $model = Curso::class;
     
    public function definition()
    {
        return [
            'clave' => Str::upper($this->faker->unique()->bothify('CRS###')), 
            'nombre' => $this->faker->sentence(3), 
            'portada' => $this->faker->imageUrl(640, 480, 'education'), 
            'contenido' => $this->faker->paragraph(4), 
            'material_didactico' => $this->faker->sentence(6), 
            'kit_robotica_id' => \App\Models\KitRobotica::inRandomOrder()->first()->id ?? \App\Models\KitRobotica::factory(), 
        ];
    }
}
