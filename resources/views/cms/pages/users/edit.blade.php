@extends('cms.layouts.cms-default')

@section('content')

    <div class="row mb-4">
        <div class="col-md-8 pl-0">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
            </a>
        </div>
        <div class="col-md-4 text-right px-0">
            <button class="btn btn-danger delete_button">
                Excluir Usuário <i class="fa fa-trash" aria-hidden="true"></i>
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

    <form action="{{route('admin.user.update', ['id' => $usuario->id])}}" method="POST">
        @csrf
        <div class="row">
            <!-- Primeira Coluna -->
            <div class="col-md-6 col-sm-12 pl-0">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{$usuario->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" value="{{$usuario->email}}">
                </div>
                <div class="form-group">
                    <label for="tipoUsuario">Tipo de Usuário</label>
                    <select name="type_id" class="form-control" id="tipoUsuario">
                        <option value="0" {{ $usuario->type_id == 0 ? 'selected' : '' }}>--</option>
                        <option value="1" {{ $usuario->type_id == 1 ? 'selected' : '' }}>Root</option>
                        <option value="2" {{ $usuario->type_id == 2 ? 'selected' : '' }}>Administrador</option>
                        <option value="3" {{ $usuario->type_id == 3 ? 'selected' : '' }}>Assistente de Conteúdo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
            </div>

            <!-- Segunda Coluna -->
            <div class="col-md-6 col-sm-12 px-0">
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input name="cpf" type="text" class="form-control" id="cpf" value="{{$usuario->cpf}}">
                </div>
                <div class="form-group">
                    <label for="birth">Data de Nascimento</label>
                    <input name="birth" type="date" class="form-control" id="birth" value="{{ $usuario->birth }}">
                </div>
                <div class="form-group">
                    <label for="tel">Telefone</label>
                    <input name="tel" type="tel" class="form-control" id="telefone" value="{{$usuario->tel}}">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="statusUsuario">
                        <option value="1" {{ $usuario->status == 1 ? 'selected' : '' }}>Ativado</option>
                        <option value="0" {{ $usuario->status == 0 ? 'selected' : '' }}>Bloqueado</option>
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
                <form id="publicidadeExcluirForm" method="POST" action="{{route('admin.user.delete', ['id' => $usuario->id])}}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Excluir Usuário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        Você tem <b>certeza</b> que deseja excluir o Usuário <b>"<span>{{$usuario->name}}</span>"</b>?
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
