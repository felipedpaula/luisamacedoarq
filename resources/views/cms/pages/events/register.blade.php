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

    <form action="{{route('admin.event.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Primeira Coluna -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="name">Título</label>
                    <input name="title" type="text" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="date_start">Data Inicial</label>
                    <input name="date_start" type="text" class="form-control date-time" autocomplete="off" id="date_start">
                </div>
                <div class="form-group">
                    <label for="resume">Resumo</label>
                    <textarea name="resume" id="resume" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="img_default">Imagem</label>
                    <img  src="{{asset('assets/site/images/resource/event-1.jpg')}}" alt="preview" width="220px" height="300px" id="preview" class="img-fluid"/>
                    <input type="file" name="img_default" class="form-control" id="img_default">
                </div>

            </div>

            <!-- Segunda Coluna -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="subtitle">Subtítulo</label>
                    <input name="subtitle" type="text" class="form-control" id="subtitle">
                </div>
                <div class="form-group">
                    <label for="date_end">Data Final</label>
                    <input name="date_end" type="text" class="form-control date-time" autocomplete="off" id="date_end">
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="body">Texto</label>
                    <textarea name="body" id="body" cols="30" rows="15" class="form-control texto-grande"></textarea>
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

        document.getElementById("img_default").addEventListener("change", readImage, false);
    </script>


@endsection
