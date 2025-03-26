<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;


class UsuarioSeeder extends Seeder
{
    public function run()
    {
        Usuario::create([
            'nombre' => 'Admon',
            'email' => 'admon@robotics.com',
            'password' => Hash::make('Adm@2022'),
            'rol' => 'administrador'
        ]);

        Usuario::create([
            'nombre' => 'Tecmilenio',
            'email' => 'tecmilenio@robotics.com',
            'password' => Hash::make('Adm@2022'),
            'rol' => 'profesor'
        ]);

        Usuario::create([
            'nombre' => 'Estudiante',
            'email' => 'student@robotics.com',
            'password' => Hash::make('Adm@2022'),
            'rol' => 'estudiante'
        ]);
    }
}
