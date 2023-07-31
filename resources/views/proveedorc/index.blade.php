@extends('layouts.base')
@extends('layouts.nav')
@section('content')
    <h5>Proveedor</h5>
    <div class="row">
        <div class="col-12">
            <div>
                <a href="{{ route('proveedor.create') }}" class="btn btn-success">Agregar Proveedor</a>
            </div>
            <div>
                <a href="{{ route('proveedor.trashed') }}" class="btn btn-primary">Elementos Eliminados</a>
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
                        <th scope="col">Razón Social</th>
                        <th scope="col">RFC</th>
                        <th scope="col">Situación Fiscal</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Calle</th>
                        <th scope="col">numExt</th>
                        <th scope="col">numInt</th>
                        <th scope="col">cp</th>
                        <th scope="col">colonia</th>
                        <th scope="col">Municipio</th>
                        <th scope="col">País</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
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
                                <a href="{{ route('proveedor.edit', $resultado->idproveedores) }}"
                                    class="btn btn-warning btn-sm">Restaurar</a>

                                <form action="{{ route('proveedor.destroy', $resultado->idproveedores) }}"
                                    method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Restaurar</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
