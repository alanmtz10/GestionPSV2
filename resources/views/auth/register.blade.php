@extends('layouts.auth')

@section('contenido')
    <div class="container center-align valign-wrapper" style="height: 100vh;">
        <div class="row">
            <div class="col s12">
                <div class="card-panel" style="background: #F29E1F9A">
                    <form action="{{ url('/reg') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">alternate_email</i>
                                <input type="email" class="validate" name="email" id="email" onblur="checkUser(this)"
                                       required>
                                <label for="email">Correo electrónico</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" class="validate" name="name" id="name" required>
                                <label for="name">Nombre</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input type="password" class="validate" name="password" id="password" required>
                                <label for="password">Contraseña</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <select name="tipoUsuario" required>
                                    <option value="" disabled selected>Elija un tipo de usuario</option>
                                    <option value="1">Vendedor</option>
                                    <option value="2">Cliente</option>
                                </select>
                                <label>Tipo de usuario</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <button class="waves-effect waves-light btn" style="width: 100%" type="submit">
                                    Registrarme
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <a href="{{ route('login') }}"
                                   style="display: inline-block; width: 100%; text-align: center">
                                    Iniciar sesión
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let isCheck = false;

        function checkUser(input) {
            let email = input.value;

            if (email.length != 0 && !isCheck) {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('verifyExistUser',':email') }}".replace(':email', email),
                    success: function (res) {
                        if (res !== '') {
                            M.toast({
                                html: `
                    <div class="green-text center-align valign-wrapper">
        <i class="material-icons">
            check
        </i>
        <p style="display: inline-block; padding-left: 10px">Usuario encontrado</p>
    </div>
                `
                            });
                            $('input[name="name"]').val(res.name);
                            $('[name="tipoUsuario"]').formSelect().val("2");
                            $('[name="tipoUsuario"]').formSelect().val("2");
                            $('[name="tipoUsuario"]').formSelect().attr('disabled', 'true')
                            $('[name="tipoUsuario"]').formSelect().attr('disabled', 'true');
                            $('input[name="tipoUsuario"]').attr('disabled', 'true');
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
        }
    </script>
@endsection
