@extends('layouts.base')
@extends('layouts.nav')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('stock.update', $stock) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            {{--  FK_PRODUCTO --}}
            <div class="col-sm-6 mb-3">
                <div class="form-group ">
                    <strong> Producto: </strong>
                    <select name="producto" id="">
                        <option value="{{$stock->producto}}">{{$stock->producto}}</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->catalogoproducto }}">{{ $producto->producto }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{--  FK_TIENDACENTRO --}}
            <div class="col-sm-6 mb-3">
                <div class="form-group ">
                    <strong>Tienda Centro: </strong>
                    <select name="tiendacentro"  id="">
                        <option value="{{$stock->tiendacentro}}">{{$stock->tiendacentro}}</option>
                        @foreach ($centros as $centro)
                            <option value="{{ $centro->idcentro }}">{{ $centro->centro }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{--  CANTIDAD --}}
            <div class="col-sm-6 mb-3">
                <div class="form-group ">
                    <strong>Cantidad: </strong>
                    <input type="text" value="{{$stock->cantidad}}" name="cantidad" max="20" class="form-control"
                        placeholder="cantidad" required>
                </div>
            </div>
            {{-- PROMOCION --}}
            <div class="col-sm-6 mb-3">
                <div class="form-group ">
                    <strong> PROMOCION: </strong>
                    <input type="text" value="{{$stock->promocion}}" name="promocion" class="form-control"
                        placeholder="promocion" required>
                </div>
            </div>
            {{-- MESPROMOCION --}}
            <div class="col-sm-6 mb-3">
                <div class="form-group ">
                    <strong> MESPROMOCIN: </strong>
                    <input type="text" value="{{$stock->mespromocion}}" name="mespromocion" class="form-control"
                        placeholder="mes promocion" required>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>

        </div>
    </form>

@endsection
