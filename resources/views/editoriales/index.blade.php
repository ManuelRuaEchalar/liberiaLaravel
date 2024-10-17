@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Editoriales</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('editoriales.create') }}" class="btn btn-primary">Nueva Editorial</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($editoriales as $editorial)
                    <tr>
                        <td>{{ $editorial->nombre }}</td>
                        <td>
                            <a href="{{ route('editoriales.edit', $editorial->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('editoriales.destroy', $editorial->id) }}" method="POST" style="display:inline-block;">
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
