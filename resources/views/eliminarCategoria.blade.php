@extends('layouts.plantilla')

    @section('contenido')

        <h1>Baja de una categoria</h1>

        <div class="row alert bg-light border-danger col-8 mx-auto p-2">
            <form action="/eliminarCategoria" method="post">

                @csrf
                @method('delete')
                <h2>{{ $categoria->catNombre }}</h2>

                <input type="hidden" name="idCategoria" value="{{ $categoria->idCategoria }}">
                <button class="btn btn-danger btn-block my-3">Confirmar baja</button>
                <a href="/categorias" class="btn btn-outline-secondary btn-block">
                    Volver al listado
                </a>
            </form>
            </div>

            <script>
                Swal.fire({
                    title: '¿Desea eliminar el producto?',
                    text: "Esta acción no se puede deshacer.",
                    type: 'error',
                    showCancelButton: true,
                    cancelButtonColor: '#8fc87a',
                    cancelButtonText: 'No, no lo quiero eliminar',
                    confirmButtonColor: '#d00',
                    confirmButtonText: 'Si, lo quiero eliminar'
                }).then((result) => {
                    if (!result.value) {
                        window.location = '/categorias'
                    }
                })
            </script>


    @endsection
