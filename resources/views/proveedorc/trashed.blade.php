@extends('layouts.base')
@extends('layouts.nav')
@section('content')
<div class="container-fluid ">
    <h1 class="text-center text-danger py-4">Restaurar elementos</h1>
    <table class="table  table-bordered table-dark table-hover">
        <a class="btn btn-success" href="restore-allP">Restore All</a>
        <a class="btn btn-info" href="{{ route('proveedor.index') }}">regresar</a>
        <thead>
            <tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Razón Social</th>
                    <th scope="col">RFC</th>
                    <th scope="col">Situación Fiscal</th>
                    <th scope="col">Activo</th>
                    <th scope="col">Calle</th>
                    <th scope="col">númExt</th>
                    <th scope="col">númInt</th>
                    <th scope="col">cp</th>
                    <th scope="col">colonia</th>
                    <th scope="col">Municipio</th>
                    <th scope="col">País</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </tr>
        </thead>
        <tbody>

            @foreach ($resultados as $resultado)
                    <tr>
                        <td class="fw-bold">{{ $resultado->idproveedores }}</td>
                        <td>{{ $resultado->razonsocial }}</td>
                        <td>{{ $resultado->rfc }}</td>
                        <td>{{ $resultado->situacionFiscal }}</td>
                        <td>{{ $resultado->activo }}</td>
                        <td>{{ $resultado->calle}}</td>
                        <td>{{ $resultado->numext}}</td>
                        <td>{{ $resultado->numint}}</td>
                        <td>{{ $resultado->cp}}</td>
                        <td>{{ $resultado->colonia}}</td>
                        <td>{{ $resultado->municipio}}</td>
                        <td>{{ $resultado->pais}}</td>
                        <td>{{ $resultado->estado}}</td>
                        <td>
                                <a href="{{ route('proveedor.restore', $resultado->idproveedores) }}"
                                    class="btn btn-info">Restaurar</a>

                        </td>
                    </tr>
                @endforeach

        </tbody>
    </table>
</div>
@endsection
