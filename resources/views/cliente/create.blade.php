@extends('layouts.dash')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h5 style="text-align: center">Registrar cliente</h5>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col s8 offset-s2">
                <img src="{{ asset('img/svg/10.svg') }}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="offset-s1 col s10">
                <form action="{{ route('cliente.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col s12">
                            <h6 style="text-align: center">Datos del cliente</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input type="text" class="validate" name="name" id="name" required>
                            <label for="name">Nombre</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">alternate_email</i>
                            <input type="email" class="validate" name="email" id="email" required>
                            <label for="email">Correo electrónico</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 center">
                            <button class="btn waves-effect waves-light">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
