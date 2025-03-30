<?php

namespace App\Http\Controllers;

use App\Models\Superheroe;
use Illuminate\Http\Request;

class SuperheroeController extends Controller
{
    /**
     * Muestra una lista de todos los superhéroes.
     */
    public function index()
    {
        $superheroes = Superheroe::all();
        return view('superheroes.index', compact('superheroes'));
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
            'foto_url' => 'required|url',
            'informacion_adicional' => 'required|string'
        ]);

        Superheroe::create($request->all());

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
            'foto_url' => 'required|url',
            'informacion_adicional' => 'required|string'
        ]);

        $superheroe->update($request->all());

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe actualizado exitosamente.');
    }

    /**
     * Elimina un superhéroe específico de la base de datos.
     */
    public function destroy(Superheroe $superheroe)
    {
        $superheroe->delete();

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe eliminado exitosamente.');
    }
}