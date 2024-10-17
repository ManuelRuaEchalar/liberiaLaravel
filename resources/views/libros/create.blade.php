@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Libro</h1>

        <form action="{{ route('libros.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}">
                @error('titulo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="editorial_id">Editorial</label>
                <select name="editorial_id" class="form-control">
                    @foreach ($editoriales as $editorial)
                        <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
                    @endforeach
                </select>
                @error('editorial_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="edicion">Edición</label>
                <input type="number" name="edicion" class="form-control" value="{{ old('edicion') }}">
                @error('edicion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pais">País</label>
                <input type="text" name="pais" class="form-control" value="{{ old('pais') }}">
                @error('pais')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" name="precio" class="form-control" value="{{ old('precio') }}">
                @error('precio')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
