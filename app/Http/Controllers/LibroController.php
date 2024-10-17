<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Editorial; // Importar el modelo Editorial
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with('editorial')->get(); // Obtiene los libros con su editorial
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $editoriales = Editorial::all(); // Obtiene todas las editoriales
        return view('libros.create', compact('editoriales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100',
            'editorial_id' => 'required|exists:editorials,id',
            'edicion' => 'required|integer',
            'pais' => 'required|max:50',
            'precio' => 'required|numeric|min:0',
        ]);

        Libro::create($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente.');
    }

    public function show(Libro $libro)
{
    return view('libros.show', compact('libro')); // Mostrar un libro específico
}

public function edit(Libro $libro)
{
    $editoriales = Editorial::all(); // Obtener todas las editoriales
    return view('libros.edit', compact('libro', 'editoriales')); // Mostrar el formulario de edición
}

public function update(Request $request, Libro $libro)
{
    $request->validate([
        'titulo' => 'required|max:100',
        'editorial_id' => 'required|exists:editorials,id',
        'edicion' => 'required|integer',
        'pais' => 'required|max:50',
        'precio' => 'required|numeric|min:0',
    ]);

    $libro->update($request->all());

    return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente.');
}

public function destroy(Libro $libro)
{
    $libro->delete();

    return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente.');
}
}
