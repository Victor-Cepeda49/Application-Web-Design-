<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    // Mostrar formulario de creación (opcional si ya lo haces en routes/web.php)
    public function create()
    {
        return view('peliculas.create');
    }

    // Almacenar nueva película o serie
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'clasificacion' => 'required|string|max:100',
            'fecha_estreno' => 'required|date',
            'resena' => 'nullable|string',
            'temporada' => 'nullable|string|max:100'
        ]);

        // Guardar en la base de datos
        Pelicula::create($validated);

        // Redireccionar con mensaje
        return redirect('/')->with('success', 'Película o serie creada correctamente.');
    }

    // (Opcional) Mostrar todas las películas
    public function index()
    {
        $peliculas = Pelicula::all();
        return view('peliculas.index', compact('peliculas'));
    }
}
