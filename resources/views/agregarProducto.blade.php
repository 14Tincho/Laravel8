@extends('layouts.plantilla')

@section('contenido')

    <h1>Agregar producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/agregarProducto" method="post" enctype="multipart/form-data">
        @csrf
        <br>
        <input type="hidden" name="idProducto" class="form-control">
        Nombre:<br>
        <input type="text" name="prdNombre" class="form-control" placeholder="Ingrese nombre del producto">
        <br>
        Precio:<br>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">$</div>
            </div>
            <input type="number" name="prdPrecio" class="form-control">
        </div>
        <br>
        Marca: <br>
        <select name="idMarca" class="form-control" required>
            <option value="">Seleccione una marca</option>
        @foreach( $marcas as $marca )
                <option value="{{ $marca->idMarca }}">{{ $marca->mkNombre }}</option>
        @endforeach
        </select>
        <br>
        Categoría: <br>
        <select name="idCategoria" class="form-control" required>
            <option value="">Seleccione una Categoría</option>
        @foreach( $categorias as $categoria )
                <option value="{{ $categoria->idCategoria }}">{{ $categoria->catNombre }}</option>
        @endforeach
        </select>
        <br>
        Presentacion: <br>
        <textarea name="prdPresentacion" class="form-control"></textarea>
        <br>
        Stock: <br>
        <input type="number" name="prdStock" class="form-control">
        <br>
        Imagen: <br>
        <input type="file" name="prdImagen" class="form-control">
        <br>
        <div>
            <button class="btn btn-dark mt-3">Agregar producto</button>
            <a href="/productos" class="btn btn-outline-dark mt-3">Volver al listado</a>
        </div>
    </form>


@endsection
