@extends('cms.layouts.cms-default')

@section('content')

    <!-- ALERTAS -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- FIM ALERTAS -->

    <div class="row">
        <div class="col-md-8 px-0 d-flex">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar usuário" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{route('admin.user.create')}}" class="btn btn-primary" type="button">+ Novo usuário</a>
        </div>
    </div>

    <div class="row mt-4">
        @if (isset($usuarios) && !empty($usuarios))
        <ul class="list-group col-12">
            <!-- Cabeçalho da Lista -->
            <li class="list-group-item">
                <div class="row font-weight-bold flex-nowrap overflow-auto">
                <div class="col-lg-3">Nome</div>
                <div class="col-lg-3">Email</div>
                <div class="col-lg-3">Tipo</div>
                <div class="col-lg-3">Ações</div>
                </div>
            </li>

            @foreach ($usuarios as $usuario)
            <!-- Item da Lista -->
            <li class="list-group-item">
            <div class="row flex-nowrap overflow-auto">
                <div class="col-lg-3">{{$usuario->name}}</div>
                <div class="col-lg-3">{{$usuario->email}}</div>
                <div class="col-lg-3">{{$usuario->type_id}}</div>
                <div class="col-lg-3">
                    @can('settings-users')
                    <a href="{{route('admin.user.edit', ['id' => $usuario->id])}}" class="btn btn-primary btn-sm">Editar</a>
                    @endcan
                </div>
            </div>
            </li>
            @endforeach
        </ul>
        {{ $usuarios->links() }}
        @else
        <p>Não existem usuários cadastrados.</p>
        @endif
    </div>
@endsection
