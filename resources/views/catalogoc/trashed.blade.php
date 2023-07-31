@extends('layouts.base')
@extends('layouts.nav')

@section('content')
    <!-- Content -->
    <div class="container-fluid ">
        <h1 class="text-center text-danger py-4">Restaurar elementos</h1>
        <table class="table table-hover table-bordered">
            <a class="btn btn-success" href="restore-all">Restore All</a>
            <a class="btn btn-info" href="{{ route('catalogo.index') }}">regresar</a>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">costo</th>
                    <th scope="col">precio</th>
                    <th scope="col">proveedor</th>
                    <th scope="col">Tipo producto</th>
                    <th scope="col">Restore</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($resultados as $resultado)
                    <tr>
                        <td class="fw-bold">{{ $resultado->catalogoproducto }}</td>
                        <td>{{ $resultado->nombre }}</td>
                        <td>{{ $resultado->descripcion }}</td>
                        <td>{{ $resultado->costo }}</td>
                        <td>{{ $resultado->precio }}</td>
                        <td>{{ $resultado->razonsocial}}</td>
                        <td>{{ $resultado->tipo}}</td>
                        <td><a href="{{ route('catalogo.restore', $resultado->catalogoproducto) }}"
                                class="btn btn-info">Restaurar</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
