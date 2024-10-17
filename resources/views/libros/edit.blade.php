<!-- resources/views/libros/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Libro</h1>

    <form action="{{ route('libros.update', $libro) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{ $libro->titulo }}" required>
        </div>
        <div>
            <label for="editorial_id">Editorial</label>
            <select name="editorial_id" id="editorial_id" required>
                @foreach ($editoriales as $editorial)
                    <option value="{{ $editorial->id }}" {{ $editorial->id == $libro->editorial_id ? 'selected' : '' }}>
                        {{ $editorial->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="edicion">Edición</label>
            <input type="number" name="edicion" id="edicion" value="{{ $libro->edicion }}" required>
        </div>
        <div>
            <label for="pais">País</label>
            <input type="text" name="pais" id="pais" value="{{ $libro->pais }}" required>
        </div>
        <div>
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" value="{{ $libro->precio }}" required step="0.01">
        </div>
        <button type="submit">Actualizar Libro</button>
    </form>
@endsection
