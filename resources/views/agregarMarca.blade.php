@extends('layouts.plantilla')

@section('contenido')

    <h1>Agregar marca</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/agregarMarca" method="post">
        @csrf
        <input type="hidden" name="idMarca" class="form-control">
        <input type="text" name="mkNombre" class="form-control" placeholder="Ingrese nombre de la marca">
        <br>
        <div>
            <button class="btn btn-dark mt-3">Agregar marca</button>
            <a href="/marcas" class="btn btn-outline-dark mt-3">Volver al listado</a>
        </div>
    </form>


@endsection
