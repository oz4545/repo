@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <p>bienvenido {{ Auth::user()->name }}!</p>
    <a href="{{ route('menu.index') }}" class="btn btn-danger">Administrar Menus</a>
    <br>
</div>

@endsection