@extends('layouts.plantilla')
@section('contenido')

    <h1>Modificar Categoria</h1>

    @if ($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all(); as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <div class="alert bg-light p-3 border">
        <form action="/modificarCategoria" method="post">
            @csrf
            @method('patch')
            <h4>Modificar la categoria {{$categoria->catNombre}}</h4>
            <input type="hidden" name="idCategoria" class="form-control" value="{{$categoria->idCategoria}}">
            Nombre:
            <input type="text" name="catNombre" class="form-control" value="{{$categoria->catNombre}}">
            <br>
            <button type="submit" class="btn btn-secondary mt-3">Modificar Categoria</button>
            <a href="/categorias" class="btn btn-outline-secondary mt-3">Volver al listado</a>
        </form>
    </div>
@endsection
