@extends('layouts.base')
@extends('layouts.nav')

@section('content')
{{-- Mostrar los errores de la validacion que se hizo en el controlador --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('proveedor.store') }}" method="post">
@csrf
    <div class="row">
        {{-- razon social --}}
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Razon social: </strong>
                <input  type="text" value="{{old('razonsocial')}}" name="razonsocial" max="30" class="form-control" placeholder="razon social" required>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>RFC: </strong>
                <input  type="text" value="{{old('rfc')}}" name="rfc" max="20" class="form-control" placeholder="rfc" required>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Tipo Persona: </strong>
                <input  type="text" value="{{old('tipopersona')}}" name="tipopersona" max="20" class="form-control" placeholder="rfc" required>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Situacion Fiscal: </strong>
                <input  type="text" value="{{old('situacionFiscal')}}" name="situacionFiscal"  class="form-control" placeholder="situacion fiscal" required>
            </div>
        </div>

        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Activo: </strong>
                <input  type="text" value="{{old('activo')}}" name="activo"  class="form-control" placeholder="activo" required>
            </div>
        </div>

        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>calle: </strong>
                <input  type="text" value="{{old('calle')}}" name="calle" max="45" class="form-control" placeholder="calle" required>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>numExt: </strong>
                <input  type="text" value="{{old('numext')}}" name="numext" min="6" class="form-control" placeholder="numext" required>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>numInt: </strong>
                <input  type="text"value="{{old('numint')}}"  name="numint" max="6" class="form-control" placeholder="numint" required>
            </div>
        </div>
        {{-- CP es fk --}}
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>CP: </strong>
                <input  type="text" value="{{old('cp')}}" name="cp" min="4" class="form-control" placeholder="cp" required>
            </div>
        </div>
        {{-- colonia es FK --}}
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Colonia: </strong>
                <input  type="text" value="{{old('colonia')}}" name="colonia" max="6" class="form-control" placeholder="colonia" required>
            </div>
        </div>
        {{-- municipio es FK --}}
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Municipio: </strong>
                <input  type="text" value="{{old('municipip')}}" name="municipio" max="6" class="form-control" placeholder="municipio" required>
            </div>
        </div>
        {{-- pais es FK --}}
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Pais: </strong>
                <select name="pais" id="">
                    <option value="">---selecciona-----</option>
                    @foreach ($paises as $pais)
                        <option value="{{$pais->idpaises}}">{{$pais->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- estado es FK --}}
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Estado: </strong>
                <select name="estado" id="">
                    <option value="">---selecciona-----</option>
                    @foreach($estados as $estado)
                        <option value="{{$estado->idestados}}">{{$estado->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Crear</button>
        </div>


    </div>
</form>

@endsection
