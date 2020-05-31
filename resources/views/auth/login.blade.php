@extends('layouts.auth')

@section('contenido')
    <div class="container center-align valign-wrapper" style="height: 100vh">
        <div class="row">
            <div class="col s12">
                <div class="card-panel" style="background: #F29E1F9A">
                    <div class="row">
                        <div class="col s12">
                            <i class="large material-icons">person</i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <h5 style="margin-top: 0">
                                Inicio de sesión
                            </h5>
                        </div>
                    </div>
                    <div class="divider" style="background: #26a69a; margin: 5px 0 5px 0"></div>
                    <form action="{{ url('/login') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">alternate_email</i>
                                <input type="email" class="validate" name="email" id="email">
                                <label for="email">Correo electrónico</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input type="password" class="validate" name="password" id="password">
                                <label for="password">Contraseña</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <button class="waves-effect waves-light btn"
                                        style="width: 100%;">
                                    Iniciar sesión
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <a href="{{ route('register') }}"
                                   style="display: inline-block; width: 100%; text-align: center; color: #A6322E">
                                    Registrarme
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
