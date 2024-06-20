@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo menu</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required minlength="5" maxlength="30" value="{{ old('nombre') }}">
        </div>
        <button type="submit" class="btn btn-primary">Crear Menu</button>
    </form>
</div>
@endsection