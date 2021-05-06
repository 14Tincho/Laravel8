@extends('layouts.plantilla')
@section('contenido')

    <h1>Modificar Marca</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{$error}} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="alert bg-light p-3 border">
        <form action="/modificarMarca" method="post">
            @csrf
            @method('patch')
            <h4>Modificar la marca {{$marca->mkNombre}}</h4>
            Nombre:
            <input type="hidden" name="idMarca" class="form-control" value="{{$marca->idMarca}}">
            <input type="text" name="mkNombre" class="form-control" value="{{$marca->mkNombre}}">
            <br>
            <button type="submit" class="btn btn-secondary mt-3">Modificar Marca</button>
            <a href="/marcas" class="btn btn-outline-secondary mt-3">Volver al listado</a>
        </form>
    </div>
@endsection
