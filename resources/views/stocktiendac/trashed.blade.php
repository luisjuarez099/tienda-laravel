@extends('layouts.base')
@extends('layouts.nav')

@section('content')
    <!-- Content -->
    <div class="container-fluid ">
        <h1 class="text-center text-danger py-4">Restaurar elementos</h1>
        <table class="table table-hover table-bordered">
            <a class="btn btn-success" href="restore-allS">Restore All</a>
            <a class="btn btn-info" href="{{ route('stock.index') }}">regresar</a>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tienda</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Promoción</th>
                    <th scope="col">Mes promoción</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($resultados as $resultado)
                    <td class="fw-bold">{{ $resultado->idstocktienda }}</td>
                    <td>{{ $resultado->producto }}</td>
                    <td>{{ $resultado->centro}}</td>
                    <td>{{ $resultado->cantidad }}</td>
                    <td>{{ $resultado->promocion}}</td>
                    <td>{{ $resultado->mespromocion}}</td>
                    <td><a href="{{ route('stock.restore', $resultado->idstocktienda) }}"
                        class="btn btn-info">Restaurar</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
