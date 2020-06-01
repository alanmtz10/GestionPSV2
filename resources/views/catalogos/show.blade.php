@extends('layouts.dash')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h5 style="text-align: center">
                    {{ $catalogo->nombre }} - {{ $catalogo->marca }}
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <iframe
                    src="http://docs.google.com/gview?url={{ asset("storage/catalogos/{$catalogo->pdf_url}") }}&embedded=true"
                    style="width:100%; height:500px;" frameborder="0"></iframe>
            </div>
        </div>
        @if(\Auth::user()->tipo_usuario == 2)
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('pedidos.create') }}?cat={{ $catalogo->id }}"
                       class="btn btn-small waves-light waves-effect"
                       style="width: 100%">
                        Hacer un pedido
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
