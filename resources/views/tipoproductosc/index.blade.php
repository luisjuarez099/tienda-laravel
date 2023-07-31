@extends('layouts.base')
@extends('layouts.nav')
@section('content')
    <h5>Tipo productos</h5>
    <div class="row">
        <div class="col-12">

            <div>
                <a href="{{ route('tipoproducto.create') }}" class="btn btn-success">Crear Nuevo Tipo de Producto</a>
            </div>
            <div>
                <a href="{{route('tipoproducto.trashed')}}" class="btn btn-primary">Elementos Eliminados</a>
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
                        <th scope="col">Tipo Producto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                @foreach ($resultados as $resultado)
                    <tr>
                        <td class="fw-bold">{{ $resultado->idtipodeproducto }}</td>
                        <td>{{ $resultado->tipo }}</td>

                        <td>
                            <a href="{{ route('tipoproducto.edit', $resultado->idtipodeproducto) }}"
                                class="btn btn-warning btn-sm">Restaurar</a>

                            <form action="{{ route('tipoproducto.destroy', $resultado->idtipodeproducto) }}" method="post"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Restaurar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{-- agregamos paginacion a nuestros resultados --}}
        {{-- {{$resultados->links()}} --}}
    </div>
@endsection
