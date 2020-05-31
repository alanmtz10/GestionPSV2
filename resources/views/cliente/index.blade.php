@extends('layouts.dash')

@section('contenido')
    <div class="container">
        <div class="row" style="padding-top: 10px">
            <div class="col s6">
                <h6>Mis clientes</h6>
            </div>
            <div class="col s1 offset-s4">
                <a href="{{ route('cliente.create') }}" class="btn-floating btn-small waves-effect waves-light teal">
                    <i class="material-icons">add</i>
                </a>
            </div>
        </div>
        @if($clientes->isEmpty())
            <div class="row">
                <div class="col s12">
                    <img src="{{ asset('img/svg/9.svg') }}" alt="" width="100%">
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="red darken-4 white-text z-depth-3"
                         style="width: 100%; padding: 15px 0 15px 0; border-radius: 15px">
                        <p style="text-align: center; font-weight: bold">¡Aun no tienes registrado ningún cliente!.</p>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col s12">
                    <ul class="collection">
                        @foreach($clientes as $c)
                            <li class="collection-item avatar">
                                <img src="{{ asset('img/avatar2.png') }}" alt="" class="circle">
                                <strong class="title">{{ $c->name }}</strong>
                                <p>{{ $c->email }}</p>
                                {{--                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>--}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
@endsection
