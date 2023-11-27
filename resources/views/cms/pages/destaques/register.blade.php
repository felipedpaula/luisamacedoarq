@extends('cms.layouts.cms-default')

@section('content')

    <!-- ALERTAS -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro!</strong> Algo não deu certo:
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- FIM ALERTAS -->

    <form action="{{route('admin.destaque.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Primeira Coluna -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="name">Título</label>
                    <input name="titulo" type="text" class="form-control" id="title">
                </div>


                <div class="form-group">
                    <label for="data_inicio">Data Inicial</label>
                    <input name="data_inicio" type="text" class="form-control date-time" autocomplete="off" id="data_inicio">
                </div>

                <div class="form-group">
                    <label for="url_link">Link</label>
                    <input name="url_link" type="text" class="form-control" id="url_link">
                </div>


                <div class="form-group">
                    <label for="type_id">Categoria de Destaque</label>
                    <select name="categoria_id" class="form-control" id="categoria_id">
                        @foreach ($destaqueCategorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->titulo}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="img_src">Imagem</label>
                    <img  src="{{asset('assets/site/images/main-slider/slider-2.jpg')}}" alt="preview" width="220px" height="300px" id="preview" class="img-fluid"/>
                    <input type="file" name="img_src" class="form-control" id="img_src">
                </div>

            </div>

            <!-- Segunda Coluna -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="subtitle">Subtítulo</label>
                    <input name="subtitulo" type="text" class="form-control" id="subtitulo">
                </div>

                <div class="form-group">
                    <label for="texto">Data Final</label>
                    <input name="data_fim" type="text" class="form-control date-time" autocomplete="off" id="data_fim">
                </div>

                <div class="form-group">
                    <label for="description">Texto do Link</label>
                    <input name="texto_link" type="text" class="form-control" id="texto_link">
                </div>

                <div class="form-group">
                    <label for="texto">Texto</label>
                    <textarea name="texto" id="texto" cols="30" rows="15" class="form-control texto-grande"></textarea>
                </div>

                <div class="form-group">
                    <label for="ordem">Ordem</label>
                    <input name="ordem" type="Number" class="form-control " id="ordem" min="0">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="1">Ativado</option>
                        <option value="0">Bloqueado</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Botão de Submissão -->
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>


    <script>
            function readImage() {
                if (this.files && this.files[0]) {
                    var file = new FileReader();
                    file.onload = function(e) {
                        document.getElementById("preview").src = e.target.result;
                    };
                    file.readAsDataURL(this.files[0]);
                }
            }

            document.getElementById("img_src").addEventListener("change", readImage, false);

    </script>


@endsection
