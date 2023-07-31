@extends('layouts.base')
@extends('layouts.nav')
@section('content')

<h1 class="mb-3">Nuevo producto</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('catalogo.update', $catalogo) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">

            {{-- se ingresa nombre del producto --}}
            <div class="col-sm-6 mb-3">
                <div class="form-group ">
                    <strong>Nombre: </strong>
                    <input value="{{$catalogo->nombre}}" type="text" name="nombre" max="30" class="form-control" placeholder="nombre" required>
                </div>
            </div>
            {{-- Descripcion del producto --}}
            <div class="col-sm-6 mb-3">
                <div class="form-group">
                    <strong>Descripcion: </strong>
                    <input  value="{{$catalogo->descripcion}}" type="text" name="descripcion" max="50" class="form-control" placeholder="Descripcion" required>
                </div>
            </div>
            {{-- costo --}}
            <div class="col-sm-1 mb-3">
                <strong>costo: </strong>
                <input value="{{$catalogo->costo}}" type="text" name="costo"  min="0" max="10000" class="form-control" placeholder="1.30" required>
            </div>
            {{-- precio --}}
            <div class="col-sm-1 mb-3">
                <strong>Precio: </strong>
                <input value="{{$catalogo->precio}}" type="text" name="precio"  min="0" max="10000" class="form-control" placeholder="5.30" required>
            </div>
            {{-- proveedor --}}
            <div class="col-sm-5 mb-3 mt-3">
                <strong>proveedor: </strong required>
                    <select name="proveedor" id="">
                        <option value="{{$catalogo->proveedor}}">{{$catalogo->proveedor}}</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{$proveedor->idProveedores}}">{{$proveedor->razonsocial}}</option>
                        @endforeach
                    </select>
            </div>

            {{-- tipo producto --}}
            <div class="col-sm-5 mb-3 mt-3">
                <strong>Tipo producto: </strong>
                <select name="tipoProducto" id="" required>
                    <option value="{{$catalogo->tipoproducto}}">{{$catalogo->tipoproducto}}</option>
                    @foreach ($tipoproductos as $tipoproducto)
                        <option value="{{$tipoproducto->idtipodeproducto}}">{{$tipoproducto->tipo}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>

        </div> {{-- fin de div=class=row --}}
    </form>
@endsection
