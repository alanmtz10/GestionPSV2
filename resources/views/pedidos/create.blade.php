@extends('layouts.dash')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h5 style="text-align: center">Registrar pedido</h5>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col s8 offset-s2">
                <img src="{{ asset('img/svg/4.svg') }}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="offset-s1 col s10">
                <form action="{{ route('pedidos.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col s12">
                            <h6 style="text-align: center">Datos del pedido</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">add_shopping_cart</i>
                            <input type="text" class="validate" name="producto" id="producto" required>
                            <label for="producto">Nombre del producto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">category</i>
                            <input type="text" class="validate" name="marca" id="marca"
                                   value="{{ isset($catalogo) && $catalogo != null ? $catalogo->marca : '' }}"
                                   required>
                            <label for="marca">Marca</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">menu_book</i>
                            <input type="text" class="validate" name="page" id="page"
                                   value="{{ isset($catalogo) && $catalogo != null ? $catalogo->nombre . ' --- Ingrese numero de página' : '' }}"
                                   required>
                            <label for="page">Catalogo y página</label>
                        </div>
                    </div>
                    @if(Auth::user()->tipo_usuario == 1)
                        <div class="row">
                            @if($clientes->isEmpty())
                                <div class="col s12">
                                    <div class="red darken-4 white-text z-depth-3 center"
                                         style="width: 100%; padding: 15px 0 15px 0; border-radius: 15px">
                                        <p style="text-align: center; font-weight: bold">¡Aun no tienes registrado
                                            ningún
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
                    @endif
                    <div class="row">
                        <div class="col s12 center">
                            <button
                                class="btn waves-effect waves-light" {{ Auth::user()->tipo_usuario == 1 && $clientes->isEmpty() ? 'disabled' : '' }}>
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
