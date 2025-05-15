<?php

namespace App\Http\Controllers;

use App\Models\Personaje;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PersonajeController extends Controller
{
    public function index()
    {
        $personajes = \App\Models\Personaje::with('peliculas')->get();
        return view('personajes.index', compact('personajes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'nullable|string',
            'descripcion' => 'nullable|string'
        ]);

        return Personaje::create($validated);

        if ($request->has('peliculas')) {
        $personaje->peliculas()->sync($validated['peliculas']);
        }

        return redirect()->route('personajes.index')->with('success', 'Personaje creado correctamente.');
    }

    public function asociarPeliculas(Request $request, Personaje $personaje)
    {
        $validated = $request->validate([
            'peliculas' => 'required|array',
            'peliculas.*' => 'exists:peliculas,id'
        ]);

        $personaje->peliculas()->sync($validated['peliculas']);

        return response()->json(['mensaje' => 'Asociación exitosa']);
    }

    public function destroy($id)
    {
        $personaje = Personaje::findOrFail($id);
        $personaje->peliculas()->detach();
        $personaje->delete();

        return redirect()->route('personajes.index')->with('success', 'Personaje eliminado.');
    }


}
