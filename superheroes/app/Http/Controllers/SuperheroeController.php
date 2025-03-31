<?php

namespace App\Http\Controllers;

use App\Models\Superheroe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperheroeController extends Controller
{
    /**
     * Muestra una lista de todos los superhéroes activos.
     */
    public function index()
    {
        $superheroes = Superheroe::all(); // Solo muestra los activos (no eliminados)
        return view('superheroes.index', compact('superheroes'));
    }

    /**
     * Muestra una lista de superhéroes eliminados.
     */
    public function trashed()
    {
        $superheroes = Superheroe::onlyTrashed()->get();
        return view('superheroes.trashed', compact('superheroes'));
    }

    /**
     * Muestra el formulario para crear un nuevo superhéroe.
     */
    public function create()
    {
        return view('superheroes.create');
    }

    /**
     * Almacena un nuevo superhéroe en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_real' => 'required|string|max:255',
            'nombre_superheroe' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'informacion_adicional' => 'required|string'
        ]);

        // Guardar la foto en el almacenamiento local
        $fotoPath = $request->file('foto')->store('superheroes', 'public');

        // Crear el superhéroe con los datos del formulario
        Superheroe::create([
            'nombre_real' => $request->nombre_real,
            'nombre_superheroe' => $request->nombre_superheroe,
            'foto_url' => $fotoPath,
            'informacion_adicional' => $request->informacion_adicional
        ]);

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe creado exitosamente.');
    }

    /**
     * Muestra los detalles de un superhéroe específico.
     */
    public function show(Superheroe $superheroe)
    {
        return view('superheroes.show', compact('superheroe'));
    }

    /**
     * Muestra el formulario para editar un superhéroe específico.
     */
    public function edit(Superheroe $superheroe)
    {
        return view('superheroes.edit', compact('superheroe'));
    }

    /**
     * Actualiza un superhéroe específico en la base de datos.
     */
    public function update(Request $request, Superheroe $superheroe)
    {
        $request->validate([
            'nombre_real' => 'required|string|max:255',
            'nombre_superheroe' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'informacion_adicional' => 'required|string'
        ]);

        // Datos para actualizar
        $data = [
            'nombre_real' => $request->nombre_real,
            'nombre_superheroe' => $request->nombre_superheroe,
            'informacion_adicional' => $request->informacion_adicional
        ];

        // Si se envió una nueva foto
        if ($request->hasFile('foto')) {
            // Guardar la nueva foto
            $fotoPath = $request->file('foto')->store('superheroes', 'public');
            $data['foto_url'] = $fotoPath;
        }

        $superheroe->update($data);

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe actualizado exitosamente.');
    }

    /**
     * Elimina un superhéroe específico (soft delete).
     */
    public function destroy(Superheroe $superheroe)
    {
        $superheroe->delete();

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe eliminado exitosamente.');
    }

    /**
     * Restaura un superhéroe previamente eliminado.
     */
    public function restore($id)
    {
        $superheroe = Superheroe::onlyTrashed()->findOrFail($id);
        $superheroe->restore();

        return redirect()->route('superheroes.trashed')
            ->with('success', 'Superhéroe restaurado exitosamente.');
    }

    /**
     * Elimina permanentemente un superhéroe (no se eliminará la imagen).
     */
    public function forceDelete($id)
    {
        $superheroe = Superheroe::onlyTrashed()->findOrFail($id);
        $superheroe->forceDelete();

        return redirect()->route('superheroes.trashed')
            ->with('success', 'Superhéroe eliminado permanentemente.');
    }
}