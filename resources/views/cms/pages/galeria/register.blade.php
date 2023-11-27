@extends('cms.layouts.cms-default')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8 pl-0">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
            </a>
        </div>
        <div class="col-md-4"></div>
    </div>

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

    <form action="{{route('admin.galeria.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Primeira Coluna -->
            <div class="col-md-6 col-sm-12 pl-0">
                <div class="form-group">
                    <label for="title">Título:</label>
                    <input name="title" type="text" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtítulo:</label>
                    <input name="subtitle" type="text" class="form-control" id="subtitle">
                </div>
                <div class="form-group">
                    <label for="body">Texto:</label>
                    <textarea name="body" id="body" cols="30" rows="15" class="form-control texto-grande"></textarea>
                </div>
            </div>

            <!-- Segunda Coluna -->
            <div class="col-md-6 col-sm-12 px-0">
                <div class="form-group">
                    <label for="resume">Resumo:</label>
                    <input name="resume" type="text" class="form-control" id="resume">
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input name="description" type="text" class="form-control" id="description">
                </div>
                <div class="form-group">
                    <label for="img_default">Imagem de destaque:</label>
                    <img  src="{{asset('assets/site/images/resource/about-2.jpg')}}" alt="preview" width="220px" height="300px" id="preview" class="img-fluid"/>
                    <input type="file" name="img_default" class="form-control" id="img_default">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="statusUsuario">
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
        document.getElementById("img_default").addEventListener("change", readImage, false);
    </script>

@endsection
