<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KitRobotica;

class KitRoboticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KitRobotica::create(['nombre' => 'StarterKit']);
        KitRobotica::create(['nombre' => 'Educational Robotics Kit']);
        KitRobotica::create(['nombre' => 'Kit5']);
    }
}
