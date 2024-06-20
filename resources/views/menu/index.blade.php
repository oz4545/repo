@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Listado de Menus</h1>
    <a href="{{ route('menu.create') }}" class="btn btn-primary mb-3">Crear Nuevo menu</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menu as $menu)
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->location }}</td>
                    <td>
                        <a href="{{ route('menu.show', $menu->id) }}" class="btn btn-info btn-sm">ingresar</a>
                        <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta biblioteca?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection