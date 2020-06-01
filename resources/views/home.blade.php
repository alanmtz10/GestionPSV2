@extends('layouts.dash')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4 style="text-align: center">
                    Hola {{ Auth::user()->name }},<br>
                    @if($horaDia >= 5 && $horaDia < 12)
                        <span>Buenos días</span>
                    @elseif($horaDia >= 12 && $horaDia < 19)
                        <span>Buenas tardes</span>
                    @else
                        <span>Buenas noches</span>
                    @endif
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <a href="{{ route('pedidos.create') }}">
                    <div class="card-panel purple lighten-3 waves-effect waves-light white-text"
                         style="width: 100%; padding: 15px; border-radius: 15px;">
                        <div class="row">
                            <div class="col offset-s1 s10">
                                <img src="{{ asset('./img/svg/6.svg') }}" width="100%">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 0">
                            <div class="col s12">
                                <h6 style="text-align: center;">Registro de pedidos</h6>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col s6">
                <a href="{{ route('pago.index') }}">
                    <div class="card-panel pink darken-3 waves-effect waves-light white-text"
                         style="width: 100%; padding: 15px; border-radius: 15px;">
                        <div class="row">
                            <div class="col offset-s1 s10">
                                <img src="{{ asset('./img/svg/2.svg') }}" width="100%">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 0">
                            <div class="col s12">
                                <h6 style="text-align: center;">Pagos pendientes</h6>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <h6>Mis catálogos</h6>
            </div>
            <div class="col s6">
                <a href="{{ route('catalogo.create') }}" class="btn btn-small waves-effect waves-light">
                    Agregar catalogo
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <ul class="collection">
                    @forelse($catalogos as $c)
                        <li class="collection-item avatar">
                            <i class="material-icons circle pink lighten-2">picture_as_pdf</i>
                            <span class="title">{{ $c->nombre }}</span>
                            <p>
                                {{ $c->marca }}
                            </p>
                            <a href="{{ route('catalogo.show', $c->id) }}" class="secondary-content"
                               style="color: #A13A3D">
                                <i class="material-icons">
                                    remove_red_eye
                                </i>
                            </a>
                        </li>
                    @empty
                        <div class="red darken-4 white-text z-depth-3"
                             style="width: 100%; padding: 15px 0 15px 0; border-radius: 15px">
                            <p style="text-align: center; font-weight: bold">¡Aun no tienes registrado ningún
                                catálogo!.</p>
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
