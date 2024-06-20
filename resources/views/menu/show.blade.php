@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Menu</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $menus->name }}</h5>
            <h2>Editar</h2>
            <ul class="list-unstyled">
                <li><a href="{{ route('categories.create', $menus) }}" class="btn btn-primary">Agregar categoria</a></li>
    
            <a href="{{ route('menu.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection