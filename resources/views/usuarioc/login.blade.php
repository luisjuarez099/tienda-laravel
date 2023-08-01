@extends('layouts.base')

@section('content')
    <section class="ms-auto me-auto mt-5">
        <div class="container-fluid h-custom">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>

                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h1>Iniciar Sesion</h1>
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="usuarios" class="form-control form-control-lg"
                                placeholder="Ingresa tu usuario Ej. bicho7" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" class="form-control form-control-lg"
                                placeholder="Enter password" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>

                        <p class="small fw-bold mt-2 pt-1 mb-0">No tienes cuenta? <a href="{{ route('registrar') }}"
                                class="link-danger">Registrar</a></p>

                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
