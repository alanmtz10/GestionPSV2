@extends('layouts.dash')

@section('contenido')
    <div class="container">
        <div class="row" style="padding-top: 10px">
            <div class="col s12">
                <h5 style="text-align: center">Notificaciones</h5>
            </div>
        </div>
        @if(isset($notificacionesNoLeidas))
            <div class="row">
                <div class="col s12">
                    <h6>Nuevas</h6>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <ul class="collection">
                        @foreach($notificacionesNoLeidas as $n)
                            <li class="collection-item avatar">
                                <i class="material-icons circle green">
                                    monetization_on
                                </i>
                                <span class="title">
                                    {{ $n->notificable_type == \App\Pago::class ? 'Información de pagos' : '' }}
                                </span>
                                <p>{{ $n->desc }} <br>
                                    {{ $n->created_at->diffForHumans() }}
                                </p>
                                <a href="{{ route('notificaciones.show', $n->id) }}" class="secondary-content">
                                    <i class="material-icons">remove_red_eye</i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @if(isset($notificacionesLeidas))
            <div class="row">
                <div class="col s12">
                    <h6>Anteriores</h6>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <ul class="collection">
                        @foreach($notificacionesLeidas as $n)
                            <li class="collection-item avatar">
                                {!! $n->notificable_type == \App\Pago::class ? '<i class="material-icons circle green">
                                    monetization_on
                                </i>' : '' !!}
                                {!! $n->notificable_type == \App\Pedido::class ? '<i class="material-icons circle orange">
                                    widgets
                                </i>' : '' !!}
                                <span class="title">
                                    {{ $n->notificable_type == \App\Pago::class ? 'Información de pagos' : '' }}
                                </span>
                                <p>{{ $n->desc }} <br>
                                    {{ $n->created_at->diffForHumans() }}
                                </p>
                                <a href="{{ route('notificaciones.show', $n->id) }}" class="secondary-content">
                                    <i class="material-icons">remove_red_eye</i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @if(!isset($notificacionesNoLeidas) && !isset($notificacionesLeidas))
            <div class="row">
                <div class="col s12">
                    <img src="{{ asset('img/svg/9.svg') }}" alt="" width="100%">
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="red darken-4 white-text z-depth-3"
                         style="width: 100%; padding: 15px 0 15px 0; border-radius: 15px">
                        <p style="text-align: center; font-weight: bold">¡Aun no tienes notificaciones!.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
