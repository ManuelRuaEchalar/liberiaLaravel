<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function index()
{
    $editoriales = Editorial::all();
    return view('editoriales.index', compact('editoriales'));
}

public function create()
{
    return view('editoriales.create');
}

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|max:100',
    ]);

    Editorial::create($request->all());

    return redirect()->route('editoriales.index')->with('success', 'Editorial creada exitosamente.');
}

public function show(Editorial $editorial)
{
    return view('editoriales.show', compact('editorial'));
}

public function edit(Editorial $editorial)
{
    return view('editoriales.edit', compact('editorial'));
}
public function update(Request $request, Editorial $editorial)
{
    $request->validate([
        'nombre' => 'required|max:100',
    ]);

    $editorial->update($request->all());

    return redirect()->route('editoriales.index')->with('success', 'Editorial actualizada exitosamente.');
}

public function destroy(Editorial $editorial)
{
    $editorial->delete();

    return redirect()->route('editoriales.index')->with('success', 'Editorial eliminada exitosamente.');
}
}
