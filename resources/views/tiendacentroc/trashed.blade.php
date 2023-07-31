@extends('layouts.base')
@extends('layouts.nav')
@section('content')
    {{-- TODA LA LOGIca --}}


    <div class="container-fluid ">
        <h1 class="text-center text-danger py-4">Restaurar elementos</h1>
        <table class="table  table-bordered table-dark table-hover">
            <a class="btn btn-success" href="restore-allTC"TC>Restore All</a>
            <a class="btn btn-info" href="{{ route('tiendacentro.index') }}">regresar</a>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Restore</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($resultados as $resultado)
                    <tr>
                        <td class="fw-bold">{{ $resultado->idtiendacentro }}</td>
                        <td>{{ $resultado->nombre }}</td>
                        <td><a href="{{ route('tiendacentro.restore', $resultado->idtiendacentro) }}"
                                class="btn btn-info">Restaurar</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
