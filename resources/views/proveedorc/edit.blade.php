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

<form action="{{ route('proveedor.update', $proveedor) }}" method="post">
@csrf
@method('PUT')
    <div class="row">
        {{-- razon social --}}
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Razon social: </strong>
                <input value="{{$proveedor->razonsocial}}" type="text" name="razonsocial" max="30" class="form-control" placeholder="razon social" required>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>RFC: </strong>
                <input value="{{$proveedor->rfc}}" type="text" name="rfc" max="20" class="form-control" placeholder="rfc" required>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Tipo Persona: </strong>
                <input value="{{$proveedor->tipopersona}}" type="text" name="tipopersona" max="20" class="form-control" placeholder="rfc" required>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Situacion Fiscal: </strong>
                <input value="{{$proveedor->situacionFiscal}}" type="text" name="situacionFiscal"  class="form-control" placeholder="situacion fiscal" required>
            </div>
        </div>

        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Activo: </strong>
                <input value="{{$proveedor->activo}}" type="text" name="activo"  class="form-control" placeholder="activo" required>
            </div>
        </div>

        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>calle: </strong>
                <input value="{{$proveedor->calle}}" type="text" name="calle" max="45" class="form-control" placeholder="calle" required>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>numExt: </strong>
                <input value="{{$proveedor->numext}}"  type="text" name="numext" min="6" class="form-control" placeholder="numext" required>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>numInt: </strong>
                <input value="{{$proveedor->numint}}"  type="text" name="numint" max="6" class="form-control" placeholder="numint" required>
            </div>
        </div>
        {{-- CP es fk --}}
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>CP: </strong>
                <input value="{{$proveedor->cp}}"  type="text" name="cp" min="4" class="form-control" placeholder="cp" required>
            </div>
        </div>
        {{-- colonia es FK --}}
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Colonia: </strong>
                <input value="{{$proveedor->colonia}}" type="text" name="colonia" max="6" class="form-control" placeholder="colonia" required>
            </div>
        </div>
        {{-- municipio es FK --}}
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Municipio: </strong>
                <input value="{{$proveedor->municipio}}" type="text" name="municipio" max="6" class="form-control" placeholder="municipio" required>
            </div>
        </div>
        {{-- pais es FK --}}
        <div class="col-sm-6 mb-3">
            <div class="form-group ">
                <strong>Pais: </strong>
                <select name="pais" id="">
                    <option value="{{$proveedor->pais}}" @selected("{{$proveedor->pais}}" == $proveedor->pais)>{{$proveedor->pais}}</option>
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
                        <option value="{{$proveedor->estado}}">{{$proveedor->estado}}</option>
                    <option>
                        @foreach($estados as $estado)
                            <option value="{{$estado->idestados}}">{{$estado->nombre}}</option>
                        @endforeach
                    </option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Crear</button>
        </div>


    </div>
</form>

@endsection
