@extends('layouts.dash')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col s6">
                {{--                <iframe--}}
                {{--                    src="http://docs.google.com/gview?url=https://www.uma.es/ejemplo-grupo-de-investigacion/navegador_de_ficheros/repositorio-grupos-de-investigacion/descargar/documentaci%C3%B3n%20becas%20junta/documento%20de%20prueba.pdf&embedded=true"--}}
                {{--                    style="width:100%; height: 60vh;" frameborder="0"></iframe>--}}

                <div class="card-panel purple darken-4 waves-effect waves-light white-text" style="width: 100%">
                    <div class="row">
                        <div class="col s12">
                            <img src="{{ asset('./img/svg/1.svg') }}" width="80%">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <h6 style="text-align: center;">Pedidos</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
