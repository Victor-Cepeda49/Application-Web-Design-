<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    // Obtener todas las notas
    public function index()
    {
        return Nota::all();
    }

    // Crear una nueva nota
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'fecha_hora' => 'required|date',
            'cuerpo' => 'required|string',
            'clasificacion' => 'required|string'
        ]);

        return Nota::create($validated);
    }

    // Mostrar una sola nota
    public function show($id)
    {
        return Nota::findOrFail($id);
    }

    // Actualizar una nota existente
    public function update(Request $request, $id)
    {
        $nota = Nota::findOrFail($id);

        $nota->update($request->all());

        return $nota;
    }

    // Eliminar una nota
    public function destroy($id)
    {
        $nota = Nota::findOrFail($id);
        $nota->delete();

        return response()->json(['mensaje' => 'Nota eliminada']);
    }
}
