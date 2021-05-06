@extends('layouts.plantilla')

@section('contenido')

    <h1>Listado de categorias</h1>


    @if (session('mensaje'))
        <div class="alert {{session('clase')}}" role="alert">
            {{session('mensaje')}}
        </div>
    @endif

    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Categorias</th>
                <th colspan="2">
                    <a href="/agregarCategoria" class="btn btn-dark">
                        Agregar
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>

        @foreach( $categorias as $categoria )
                <tr>
                    <td>{{ $categoria->idCategoria }}</td>
                    <td>{{ $categoria->catNombre }}</td>
                    <td>
                        <a href="/modificarCategoria/{{ $categoria->idCategoria }}" class="btn btn-outline-secondary">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <a href="/eliminarCategoria/{{ $categoria->idCategoria }}" class="btn btn-outline-danger">
                            Eliminar
                        </a>
                    </td>
                </tr>
        @endforeach

        </tbody>
    </table>

    {{ $categorias->links() }}

@endsection
