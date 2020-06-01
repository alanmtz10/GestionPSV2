@extends('layouts.dash')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h5 style="text-align: center">Editar pago pendiente</h5>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col s8 offset-s2">
                <img src="{{ asset('img/svg/10.svg') }}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="offset-s1 col s10">
                <form action="{{ route('pago.update', $pago->id ) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col s12">
                            <h6 style="text-align: center">Datos del pago</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">description</i>
                            <input type="text" class="validate" name="desc" id="desc" value="{{ $pago->desc }}"
                                   disabled>
                            <label for="desc">Producto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">monetization_on</i>
                            <input type="text" class="validate" name="monto" id="monto" value="">
                            <label for="monto">Cantidad a abonar de los ${{ $pago->monto }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">date_range</i>
                            <input type="text" class="datepicker" name="fecha_max"
                                   placeholder="{{ $pago->prox_fecha }}">
                            <label for="fech_max">Nueva fecha de pago</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 center">
                            <button class="btn waves-effect waves-light">
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
