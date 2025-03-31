<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $asignatura_id = $request->asignatura_id;
        $asignatura = Asignatura::findOrFail($asignatura_id);
        $actividades = Actividad::where('asignatura_id', $asignatura_id)->get();
        
        return view('actividades.index', compact('actividades', 'asignatura'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $asignatura_id = $request->asignatura_id;
        $asignatura = Asignatura::findOrFail($asignatura_id);
        
        $tipos = ['Tarea', 'Actividad', 'Prueba rápida', 'Examen Parcial', 'Examen Final', 'Evidencias', 'Otro'];
        
        return view('actividades.create', compact('asignatura', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'asignatura_id' => 'required|exists:asignaturas,id',
            'tipo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'calificacion' => 'nullable|numeric|between:0,100',
            'fecha' => 'required|date',
            'comentario' => 'nullable|string',
        ]);

        Actividad::create($request->all());

        return redirect()->route('asignaturas.show', $request->asignatura_id)
            ->with('success', 'Actividad registrada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Actividad $actividad)
    {
        return view('actividades.show', compact('actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actividad $actividad)
    {
        $asignatura = $actividad->asignatura;
        $tipos = ['Tarea', 'Actividad', 'Prueba rápida', 'Examen Parcial', 'Examen Final', 'Evidencias', 'Otro'];
        
        return view('actividades.edit', compact('actividad', 'asignatura', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actividad $actividad)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'calificacion' => 'nullable|numeric|between:0,100',
            'fecha' => 'required|date',
            'comentario' => 'nullable|string',
        ]);

        $actividad->update($request->all());

        return redirect()->route('asignaturas.show', $actividad->asignatura_id)
            ->with('success', 'Actividad actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actividad $actividad)
    {
        $asignatura_id = $actividad->asignatura_id;
        $actividad->delete();

        return redirect()->route('asignaturas.show', $asignatura_id)
            ->with('success', 'Actividad eliminada exitosamente');
    }
}
