@extends('layouts.plantilla')

    @section('contenido')

        <h1>Modificar Producto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="alert bg-light p-3 border">
            <form action="/modificarProducto" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <input type="hidden" name="idProducto" class="form-control" value="{{$producto->idProducto}}">
                Nombre: <br>
                <input type="text" name="prdNombre" class="form-control" value="{{$producto->prdNombre}}">
                <br>
                Precio: <br>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="prdPrecio" class="form-control" value="{{$producto->prdPrecio}}">
                </div>
                <br>
                Marca: <br>
                <select name="idMarca" class="form-control" required>
                    <option value="{{ $producto->relMarca->idMarca }}">{{ $producto->relMarca->mkNombre }}</option>
                @foreach( $marcas as $marca )
                        <option value="{{ $marca->idMarca }}">{{ $marca->mkNombre }}</option>
                @endforeach
                </select>
                <br>
                Categoría: <br>
                <select name="idCategoria" class="form-control" required>
                    <option value="{{ $producto->relCategoria->idCategoria }}">{{ $producto->relCategoria->catNombre }}</option>
                @foreach( $categorias as $categoria )
                        <option value="{{ $categoria->idCategoria }}">{{ $categoria->catNombre }}</option>
                @endforeach
                </select>
                <br>
                Presentacion: <br>
                <textarea name="prdPresentacion" class="form-control">{{$producto->prdPresentacion}}</textarea>
                <br>
                Stock: <br>
                <input type="number" name="prdStock" class="form-control" value="{{$producto->prdStock}}">
                <br>
                Imagen: <br>
                <input type="file" name="prdImagen" id="prdImagen" class="form-control">
                <input type="hidden" name="prdImg" class="form-control" value="{{$producto->prdImagen}}">
                <img src="/image/{{ $producto->prdImagen }}" class="img-thumbnail">
                <br>
                <input type="submit" value="Modificar Producto" class="btn btn-secondary mb-3">
                <a href="/productos" class="btn btn-outline-secondary mb-3">Volver al panel de Productos</a>
            </form>

        </div>
    @endsection
