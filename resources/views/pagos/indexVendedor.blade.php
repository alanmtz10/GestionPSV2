@extends('layouts.dash')

@section('contenido')
    <div class="container">
        <div class="row" style="padding-top: 10px">
            <div class="col s12">
                <h5 style="text-align: center">Pagos pendientes de clientes</h5>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
               <a class="btn btn-small" style="width: 100%">Notificar pago a cliente</a>
            </div>
        </div>
        @if($pagos->isEmpty())
            <div class="row">
                <div class="col s12">
                    <img src="{{ asset('img/svg/9.svg') }}" alt="" width="100%">
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="red darken-4 white-text z-depth-3"
                         style="width: 100%; padding: 15px 0 15px 0; border-radius: 15px">
                        <p style="text-align: center; font-weight: bold">¡Aun no tienes registrado ningún pago
                            pendiente!.</p>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col s12">
                    <ul class="collection">
                        @foreach($pagos as $p)
                            <li class="collection-item avatar">
                                <img src="{{ asset('img/avatar.png') }}" alt="" class="circle">
                                <strong class="title">{{ $p->desc }}</strong>
                                <p>{{ $p->monto }}</p>
                                <p>{{ $p->cliente->name }}</p>
                                <p>{{ $p->created_at->diffForHumans() }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
@endsection
