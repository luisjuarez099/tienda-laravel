@extends('layouts.base')

@section('content')
    <section class="ms-auto me-auto mt-5">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>

                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h1>Registro nuevo usuario</h1>
                    <form method="POST" action="{{ route('registrar.post') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="usuarios" id="" class="form-control form-control-lg"
                                placeholder="Ej. Elbicho" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" id="" class="form-control form-control-lg"
                                placeholder="Enter password" />
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>

                        <!-- Return logiin -->
                        <p class="small fw-bold mt-2 pt-1 mb-0"> Ya eres miembro? <a href="{{ route('login') }}"
                                class="link-danger">Iniciar Sesion</a></p>

                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
