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
                Excluir Evento <i class="fa fa-trash" aria-hidden="true"></i>
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
    <!-- FIM ALERTAS -->

    <form action="{{route('admin.event.update', ['id' => $event->id])}}" method="POST" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        @csrf
        <div class="row">
            <!-- Primeira Coluna -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="name">Título</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{isset($event->title) === true ? $event->title : ''}}">
                </div>
                <div class="form-group">
                    <label for="date_start">Data Inicial</label>
                    <input name="date_start" type="text" class="form-control date-time" autocomplete="off" id="date_start"
                    value="{{ isset($event->date_start) === true ? date('d/m/Y H:i', strtotime($event->date_start)) : '' }}"
                    >
                </div>
                <div class="form-group">
                    <label for="resume">Resumo</label>
                    <textarea name="resume" id="resume" cols="30" rows="10" class="form-control">{{isset($event->resume) === true ? $event->resume : ''}}</textarea>
                </div>

                <div class="form-group">
                    <label for="img_default">Imagem</label>
                    <img  src="{{asset($event->img_default)}}" alt="preview" width="220px" height="300px" id="preview" class="img-fluid"/>
                    <input type="file" name="img_default" class="form-control" id="img_default">
                </div>

            </div>

            <!-- Segunda Coluna -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="subtitle">Subtítulo</label>
                    <input name="subtitle" type="text" class="form-control" id="subtitle" value="{{isset($event->subtitle) === true ? $event->subtitle : ''}}">
                </div>
                <div class="form-group">
                    <label for="date_end">Data Final</label>
                    <input name="date_end" type="text" class="form-control date-time" autocomplete="off" id="date_end"
                    value="{{ isset($event->date_end) === true ? date('d/m/Y H:i', strtotime($event->date_end)) : '' }}"
                    >
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{isset($event->description) === true ? $event->description : ''}}</textarea>
                </div>

                <div class="form-group">
                    <label for="body">Texto</label>
                    <textarea name="body" id="body" cols="30" rows="15" class="form-control texto-grande">{!! isset($event->body) === true ? $event->body : '' !!}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="1" {{isset($event->status) === true && $event->status === 1 ? 'selected="selected"' : ''}}>Ativado</option>
                        <option value="0" {{isset($event->status) === true && $event->status === 0 ? 'selected="selected"' : ''}}>Bloqueado</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Botão de Submissão -->
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="publicidadeExcluirForm" method="POST" action="{{route('admin.event.delete', ['id' => $event->id])}}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Excluir Evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        Você tem <b>certeza</b> que deseja excluir o Evento <b>"<span></span>"</b>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
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
