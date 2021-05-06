@extends('layouts.plantilla')

@section('contenido')


    <h1>Agregar Categoria</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/agregarCategoria" method="post">
        @csrf
        <input type="hidden" name="idCategoria" class="form-control">
        <input type="text" name="catNombre" class="form-control" placeholder="Ingrese nombre de la categorias">
        <br>
        <div>
            <button class="btn btn-dark mt-3">Agregar categoria</button>
            <a href="/categorias" class="btn btn-outline-dark mt-3">Volver al listado</a>
        </div>
    </form>


@endsection

