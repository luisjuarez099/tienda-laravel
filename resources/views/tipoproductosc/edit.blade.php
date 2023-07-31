@extends('layouts.base')
@extends('layouts.nav')
@section('content')
    <h1>editar tipo de producto</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tipoproducto.update', $tipoproducto) }}" method="post">
        @csrf
        {{-- metodo para actualizar --}}
        @method('PUT')
        <div class="row">
            <div class="col-sm-6 mb-3">
                <div class="form-group ">
                    <strong>Tipo de producto: </strong>
                    <input value="{{ $tipoproducto->tipo }}" type="text" name="tipo" class="form-control"
                        placeholder="tipo de producto" required>
                    @error('tipo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>

    </form>
@endsection
