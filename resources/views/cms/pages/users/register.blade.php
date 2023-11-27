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

    <form action="{{route('admin.user.store')}}" method="POST">
        @csrf
        <div class="row">
            <!-- Primeira Coluna -->
            <div class="col-md-6 col-sm-12 pl-0">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input name="name" type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="tipoUsuario">Tipo de Usuário</label>
                    <select name="type_id" class="form-control" id="tipoUsuario">
                        <option value="0">--</option>
                        <option value="1">Root</option>
                        <option value="2">Administrador</option>
                        <option value="3">Assistente de Conteúdo</option>
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
                    <input name="cpf" type="text" class="form-control" id="cpf">
                </div>
                <div class="form-group">
                    <label for="birth">Data de Nascimento</label>
                    <input name="birth" type="date" class="form-control" id="birth">
                </div>
                <div class="form-group">
                    <label for="tel">Telefone</label>
                    <input name="tel" type="tel" class="form-control" id="telefone">
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
@endsection
