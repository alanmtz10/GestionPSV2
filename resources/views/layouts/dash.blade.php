<!doctype html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        img {
            vertical-align: middle;
        }

        .container {
            width: 100vw;
        }

        .sidenav-overlay {
            display: none !important;
        }

        .datepicker::placeholder {
            color: dimgrey;
        }

        .new-notifications {
            color: white !important;
            animation-name: alert;
            animation-duration: 1s;
            animation-delay: 0s;
            animation-direction: alternate;
            animation-iteration-count: infinite;
        }

        .new-notifications .text {
            color: white !important;
        }

        @keyframes alert {
            0% {
                background: #ad1457;
            }
            100% {
                background: #ce93d8;
            }
        }
    </style>
</head>
<body>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="slide-out" class="sidenav">
                <li>
                    <div class="user-view" style="background: rgba(0,0,0,0.4)">
                        <div class="background">
                            <img src="{{ asset('img/bg1.jpg') }}">
                        </div>
                        <a href="#user"><img class="circle" src="{{ asset('img/avatar.png') }}"></a>
                        <a href="#name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
                        <a href="#email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
                    </div>
                </li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="material-icons">
                            home
                        </i>
                        Inicio
                    </a>
                </li>
                @if(Auth::user()->tipo_usuario == 1)
                    <li>
                        <a href="{{ route('clientes.index') }}">
                            <i class="material-icons">
                                people_alt
                            </i>
                            Mis clientes
                        </a>
                    </li>
                @endif
                <li class="{{ isset($nNotificaciones) && $nNotificaciones != 0 ? 'new-notifications' : '' }}">
                    <a href="{{ route('notificaciones.index') }}" class="text">
                        <i class="material-icons text">
                            warning
                        </i>
                        Notificaciones
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#" onclick="cerrarSesion()">
                        <i class="material-icons">
                            exit_to_app
                        </i> Cerrar sesión
                    </a>
                    <form action="{{ route('logout') }}" method="POST" id="formLogout">
                        @csrf
                    </form>
                </li>
            </ul>
            <a href="{{ route('home') }}" class="right" style="margin-right: 10px">
                <img src="{{ asset('img/avatar.png') }}" class="circle center-align" height="40px" width="40px">
            </a>
        </div>
    </nav>
</div>
@yield("contenido")

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    M.AutoInit();

    $('input[fecha_max]').datepicker({
        minDate: Date.now()
    });

    function cerrarSesion() {
        $('#formLogout').submit();
    }
</script>

@include('partials.messages')

@yield('scripts')
</body>
</html>
