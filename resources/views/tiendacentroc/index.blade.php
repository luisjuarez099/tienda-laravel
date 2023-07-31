@extends('layouts.base')
@extends('layouts.nav')
@section('content')
    <h5>Tienda Centro</h5>
    <div class="row">
        <div class="col-12">


            <div>
                <a href="{{ route('tiendacentro.trashed') }}" class="btn btn-primary">Elementos Desactivados</a>
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
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                @foreach ($resultados as $resultado)
                    <tr>
                        <td class="fw-bold">{{ $resultado->idtiendacentro }}</td>
                        <td>{{ $resultado->nombre }}</td>

                        <td>
                            {{-- <a href="{{ route('tiendacentro.edit', $resultado->idtiendacentro) }}"
                                class="btn btn-warning btn-sm">Restaurar</a> --}}

                            <form action="{{ route('tiendacentro.destroy', $resultado->idtiendacentro) }}" method="post"
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
    </div>
@endsection
