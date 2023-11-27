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
                Excluir Classe <i class="fa fa-trash" aria-hidden="true"></i>
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

    <form action="{{route('admin.classe.update', ['id' => $classe->id])}}" method="POST">
        @csrf
        <div class="row">
            <!-- Primeira Coluna -->
            <div class="col-md-6 col-sm-12 pl-0">
                <div class="form-group">
                    <label for="title">Nome da turma</label>
                    <input name="title" type="text" class="form-control" id="title-classe" value="{{$classe->title}}">
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea name="description" id="description-classe" class="form-control" cols="30" rows="3">{{$classe->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="body">Texto:</label>
                    <textarea name="body" id="body-classe" class="form-control" cols="30" rows="5">{{$classe->body}}</textarea>
                </div>
            </div>

            <!-- Segunda Coluna -->
            <div class="col-md-6 col-sm-12 px-0">
                <div class="form-group">
                    <label for="teacher">Nome do professor</label>
                    <input name="teacher" type="text" class="form-control" id="teacher-classe" value="{{$classe->teacher}}">
                </div>
                <div class="form-group">
                    <label for="dates">Dias da semana <small>(Segunda, Terça e Quarta)</small></label>
                    <input name="dates" type="text" class="form-control" id="dates-classe" value="{{$classe->dates}}">
                </div>
                <div class="form-group">
                    <label for="time">Horário <small>(00:00 às 00:00)</small></label>
                    <input name="time" type="text" class="form-control" id="time-classe" value="{{$classe->time}}">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="statusUsuario">
                        <option value="1" {{ $classe->status == 1 ? 'selected' : '' }}>Ativado</option>
                        <option value="0" {{ $classe->status == 0 ? 'selected' : '' }}>Bloqueado</option>
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
                <form id="publicidadeExcluirForm" method="POST" action="{{route('admin.classe.delete', ['id' => $classe->id])}}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Excluir Classe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        Você tem <b>certeza</b> que deseja excluir a Classe <b>"<span>{{$classe->title}}</span>"</b>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
