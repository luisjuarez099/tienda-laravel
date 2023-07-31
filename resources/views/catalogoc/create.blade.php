@extends('layouts.base')
@extends('layouts.nav')
@section('content')

    <h1 class="mb-3">Nuevo producto</h1>
    {{-- muestra los errores que se hayan validado en el controlador --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('catalogo.store') }}" method="post">
        @csrf
        <div class="row">

            {{-- se ingresa nombre del producto --}}
            <div class="col-sm-6 mb-3">
                <div class="form-group ">
                    <strong>Nombre: </strong>
                    <input type="text" name="nombre" value="{{old('nombre')}}" max="30" class="form-control" placeholder="nombre" required>
                    @error('nombre')
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            {{-- Descripcion del producto --}}
            <div class="col-sm-6 mb-3">
                <div class="form-group">
                    <strong>Descripcion: </strong>
                    <input type="text" value="{{old('descripcion')}}" name="descripcion" max="50" class="form-control" placeholder="Descripcion"
                        required>
                    @error('descripcion')
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            {{-- costo --}}
            <div class="col-sm-1 mb-3">
                <strong>costo: </strong>
                <input type="text" name="costo" min="4" value="{{old('costo')}}" class="form-control" placeholder="130"
                    required>


            </div>
            {{-- precio --}}
            <div class="col-sm-1 mb-3">
                <strong>Precio: </strong>
                <input type="text" name="precio" min="4" value="{{old('precio')}}" class="form-control" placeholder="530"
                    required>

            </div>
            {{-- proveedor --}}
            <div class="col-sm-5 mb-3 mt-3">
                <strong>proveedor: </strong required>
                <select name="proveedor" id="">
                    <option value="">---selecciona-----</option>
                    @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->idproveedores }}">{{ $proveedor->razonsocial }}</option>
                    @endforeach
                </select>
            </div>

            {{-- tipo producto --}}
            <div class="col-sm-5 mb-3 mt-3">
                <strong>Tipo producto: </strong>
                <select name="tipoProducto" id="" required>
                    <option value="">---selecciona-----</option>
                    @foreach ($tipoproductos as $tipoproducto)
                        <option value="{{ $tipoproducto->idtipodeproducto }}">{{ $tipoproducto->tipo }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>

        </div> {{-- fin de div=class=row --}}
    </form>
@endsection
