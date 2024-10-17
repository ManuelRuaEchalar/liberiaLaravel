@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Editorial</h1>

        <form action="{{ route('editoriales.update', $editorial->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Campos del formulario -->
    <input type="text" name="nombre" value="{{ $editorial->nombre }}">

    <button type="submit">Actualizar</button>
</form>
    </div>
@endsection
