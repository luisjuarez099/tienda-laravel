@extends('layouts.base')
@extends('layouts.nav')
@section('content')
    <h5>Stock tienda</h5>
    <div class="row">
        <div class="col-12">

            <div>
                <a href="{{ route('stock.create') }}" class="btn btn-success">Crear Nuevo Producto</a>
            </div>
            <div>
                <a href="{{route('stock.trashed')}}" class="btn btn-primary">Elementos Eliminados</a>
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
                        <th scope="col">Tienda</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Promoción</th>
                        <th scope="col">Mes promoción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                @foreach ($resultados as $resultado)
                    <tr>
                        <td class="fw-bold">{{ $resultado->idstocktienda }}</td>
                        <td>{{ $resultado->producto }}</td>
                        <td>{{ $resultado->centro}}</td>
                        <td>{{ $resultado->cantidad }}</td>
                        <td>{{ $resultado->promocion}}</td>
                        <td>{{ $resultado->mespromocion}}</td>
                        <td>
                                <a href="{{ route('stock.edit', $resultado->idstocktienda) }}"
                                    class="btn btn-warning btn-sm">Editar</a>

                                <form action="{{ route('stock.destroy', $resultado->idstocktienda) }}"
                                    method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Desactivar</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{-- {{$resultados->links()}} --}}
    </div>
@endsection
