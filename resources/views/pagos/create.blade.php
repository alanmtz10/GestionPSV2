@extends('layouts.dash')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h5 style="text-align: center">Registrar pago pendiente</h5>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col s8 offset-s2">
                <img src="{{ asset('img/svg/10.svg') }}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="offset-s1 col s10">
                <form action="{{ route('pago.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col s12">
                            <h6 style="text-align: center">Datos del pago</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">description</i>
                            <input type="text" class="validate" name="desc" id="desc" required>
                            <label for="desc">Producto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">monetization_on</i>
                            <input type="text" class="validate" name="monto" id="monto" required>
                            <label for="monto">Monto a pagar</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">date_range</i>
                            <input type="text" class="datepicker" name="fecha_max">
                            <label for="fecha_max">Fecha de pago</label>
                        </div>
                    </div>
                    <div class="row">
                        @if($clientes->isEmpty())
                            <div class="col s12">
                                <div class="red darken-4 white-text z-depth-3 center"
                                     style="width: 100%; padding: 15px 0 15px 0; border-radius: 15px">
                                    <p style="text-align: center; font-weight: bold">¡Aun no tienes registrado ningún
                                        cliente!.</p> <br>
                                    <a href="{{ route('cliente.create') }}" class="white-text">
                                        <u>Registra uno aqui</u>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="input-field col s12">
                                <select name="cliente">
                                    <option value="" disabled selected>Selecciona un cliente</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">
                                            {{ $cliente->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label>Cliente</label>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col s12 center">
                            <button class="btn waves-effect waves-light" {{ $clientes->isEmpty() ? 'disabled' : '' }}>
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
