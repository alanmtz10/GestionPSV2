@extends('layouts.dash')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h5 style="text-align: center">Registrar catálogo</h5>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col s8 offset-s2">
                <img src="{{ asset('img/svg/8.svg') }}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="offset-s1 col s10">
                <form action="{{ route('catalogo.store') }}" method="POST" enctype="multipart/form-data" id="miForm">
                    @csrf
                    <div class="row">
                        <div class="col s12">
                            <h6 style="text-align: center">Datos del catalogo</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">style</i>
                            <input type="text" class="validate" name="name" id="name" required>
                            <label for="name">Nombre del catalogo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">local_library</i>
                            <input type="text" class="validate" name="marca" id="marca" required>
                            <label for="marca">Marca del catálogo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="btn-floating">
                                <i class="material-icons">attach_file</i>
                                <input type="file" name="catalogoPDF">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text"
                                       placeholder="Selecciona un catalogo en PDF">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="progressBarFileUpload">
                        <div class="col s5 offset-s2">
                            <div class="preloader-wrapper big active">
                                <div class="spinner-layer spinner-blue">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="gap-patch">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>
                                <div class="spinner-layer spinner-red">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="gap-patch">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>
                                <div class="spinner-layer spinner-yellow">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="gap-patch">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>

                                <div class="spinner-layer spinner-green">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="gap-patch">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s3">
                            <p id="progressText"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 center">
                            <button class="btn waves-effect waves-light">Registrar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#miForm').on('submit', function (e) {
            e.preventDefault()
            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var porcentaje = (evt.loaded / evt.total) * 100;
                            console.log(porcentaje);
                            $('#progressText').text('%' + porcentaje)
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: "{{ route('catalogo.store') }}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('#progressBarFileUpload').css('display', 'inline');
                },
                error: function (error) {
                    console.log(error);
                },
                success: function (resp) {
                    console.log(resp);
                    if (resp == 'ok') {
                        $('#progressBarFileUpload').css('display', 'none');
                    }
                }
            });
        });
    </script>
@endsection
