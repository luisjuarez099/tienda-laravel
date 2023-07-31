@extends('layouts.base')
@extends('layouts.nav')
@section('content')
    <h5>Catalogo</h5>
    <div class="row">
        <div class="col-12">

            <div>
                <a href="{{ route('catalogo.create') }}" class="btn btn-success">Crear Nuevo Producto</a>
            </div>
            {{-- Boton es para restaurar los elementos eliminados --}}
            <div>
                <a href="{{route('catalogo.trashed')}}" class="btn btn-primary">Elementos Eliminados</a>
            </div>

        </div>
        @if (Session::get('success'))
            <div class="alert alert-success mt-2">
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif
        <div class="col-12 mt-4">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">costo</th>
                        <th scope="col">precio</th>
                        <th scope="col">proveedor</th>
                        <th scope="col">Tipo producto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                @foreach ($resultados as $resultado)
                    <tr>
                        <td class="fw-bold">{{ $resultado->catalogoproducto }}</td>
                        <td>{{ $resultado->nombre }}</td>
                        <td>{{ $resultado->descripcion }}</td>
                        <td>${{ $resultado->costo }}</td>
                        <td>${{ $resultado->precio }}</td>
                        <td>{{ $resultado->razonsocial}}</td>
                        <td>{{ $resultado->tipo}}</td>
                        <td>
                                <a href="{{ route('catalogo.edit', $resultado->catalogoproducto) }}"
                                    class="btn btn-warning btn-sm">Editar</a>

                                <form action="{{ route('catalogo.destroy', $resultado->catalogoproducto) }}"
                                    method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{-- {{$resultados->links()}} --}}
    </div>
@endsection
