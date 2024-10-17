@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Libros</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('libros.create') }}" class="btn btn-primary">Nuevo Libro</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Editorial</th>
                    <th>Edición</th>
                    <th>País</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                    <tr>
                        <td>{{ $libro->titulo }}</td>
                        <td>{{ $libro->editorial->nombre }}</td>
                        <td>{{ $libro->edicion }}</td>
                        <td>{{ $libro->pais }}</td>
                        <td>{{ $libro->precio }}</td>
                        <td>
                            <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
