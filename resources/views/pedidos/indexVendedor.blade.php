@extends('layouts.dash')

@section('contenido')
    <div class="container">
        <div class="row" style="padding-top: 10px">
            <div class="col s12">
                @if(Auth::user()->tipo_usuario == 1)
                    <h5 style="text-align: center">Pedidos de clientes</h5>
                @else
                    <h5 style="text-align: center">Mis pedidos</h5>
                @endif
            </div>
        </div>
        @if($pedidos->isEmpty())
            <div class="row">
                <div class="col s12">
                    <img src="{{ asset('img/svg/9.svg') }}" alt="" width="100%">
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="red darken-4 white-text z-depth-3"
                         style="width: 100%; padding: 15px 0 15px 0; border-radius: 15px">
                        @if(Auth::user()->tipo_usuario == 1)
                            <p style="text-align: center; font-weight: bold">
                                ¡Tus clientes aún no han registrado ningún
                                pedido!.
                            </p>
                        @else
                            <p style="text-align: center; font-weight: bold">
                                ¡Aún no has registrado ningún
                                pedido!.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col s12">
                    <ul class="collection">
                        @foreach($pedidos as $p)
                            <li class="collection-item avatar">
                                <strong class="title">{{ $p->producto }}</strong>
                                <p>{{ $p->marca }}</p>
                                <p>{{ $p->cat_pag }}</p>
                                <p>Realizado el {{ $p->created_at->format('d/m/Y') }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
@endsection
