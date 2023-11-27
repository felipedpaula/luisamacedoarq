@extends('cms.layouts.cms-default')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8 pl-0">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
            </a>
        </div>
        <div class="col-md-4 text-right">
            <button class="btn btn-danger delete_button">
                Excluir Galeria <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        </div>
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

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                    <input name="title" type="text" class="form-control" id="title" value="{{$galeria->title}}">
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtítulo:</label>
                    <input name="subtitle" type="text" class="form-control" id="subtitle" value="{{$galeria->subtitle}}">
                </div>
                <div class="form-group">
                    <label for="body">Texto:</label>
                    <textarea name="body" id="body" cols="30" rows="5" class="form-control texto-grande">{{$galeria->body}}</textarea>
                </div>
            </div>

            <!-- Segunda Coluna -->
            <div class="col-md-6 col-sm-12 px-0">
                <div class="form-group">
                    <label for="resume">Resumo:</label>
                    <input name="resume" type="text" class="form-control" id="resume" value="{{$galeria->resume}}">
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input name="description" type="text" class="form-control" id="description" value="{{$galeria->description}}">
                </div>
                <div class="form-group">
                    <label for="img_default">Imagem de destaque:</label>
                    <img  src="{{asset($galeria->img_default)}}" alt="preview" width="220px" height="300px" id="preview" class="img-fluid"/>
                    <input type="file" name="img_default" class="form-control" id="img_default">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="statusGaleria">
                        <option value="1" {{ $galeria->status == 1 ? 'selected' : '' }}>Ativado</option>
                        <option value="0" {{ $galeria->status == 0 ? 'selected' : '' }}>Bloqueado</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <label for="imagens">Imagens da Galeria:</label>
            <div class="col-12 px-0">
                <div class="d-flex flex-wrap">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#imagemModal" style="width:100px;height:100px;font-size:50px">+</button>
                    @foreach ($imagens as $imagem)
                    <div class="img-galeria">
                        <img width="100px" height="100px" src="{{$imagem->src}}" alt="{{$imagem->img_alt}}">
                        <a href="{{ route('admin.galeria.remove', ['id' => $galeria->id, 'id_foto' => $imagem->id]) }}" class="lixeira-layer" onclick="return confirm('Tem certeza que deseja excluir esta imagem?')">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


        <!-- Botão de Submissão -->
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>

    <!-- Modal Deletar Galeria -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="publicidadeExcluirForm" method="POST" action="{{route('admin.galeria.delete', ['id' => $galeria->id])}}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Excluir Galeria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        Você tem <b>certeza</b> que deseja excluir a Galeria <b>"<span>{{$galeria->title}}</span>"</b>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Adiciona Imagem -->
    <div class="modal fade" id="imagemModal" tabindex="-1" role="dialog" aria-labelledby="imagemModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagemModalLabel">Adicionar Imagem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.galeria.add', ['id' => $galeria->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="imagemTitulo">Título</label>
                            <input type="text" class="form-control" id="imagemTitulo" name="title" placeholder="Título da imagem">
                        </div>
                        <div class="form-group">
                            <label for="imagemFile">Escolher imagem</label>
                            <input type="file" class="form-control-file" id="imagemFile" name="imagem">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar Imagem</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
