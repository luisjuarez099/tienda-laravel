@extends('layouts.base')
@extends('layouts.nav')
@section('content')
    <h1>crear tipo de producto</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tipoproducto.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-6 mb-3">
                <div class="form-group ">
                    <strong>Tipo de producto: </strong>
                    <input type="text" name="tipo" class="form-control" placeholder="tipo de producto" required>

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Crear</button>
        </div>

    </form>
@endsection
