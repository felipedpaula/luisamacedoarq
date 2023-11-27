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
        <div class="col-md-8 px-0"></div>
        <div class="col-md-4 text-right">
            <a href="{{route('admin.classe.create')}}" class="btn btn-primary" type="button">+ Nova turma</a>
        </div>
    </div>

    <div class="row mt-4">
        @if (isset($classes) && !empty($classes))
        <ul class="list-group col-12">
            <!-- Cabeçalho da Lista -->
            <li class="list-group-item">
                <div class="row font-weight-bold flex-nowrap overflow-auto">
                <div class="col-lg-3">Nome</div>
                <div class="col-lg-6">Professor</div>
                <div class="col-lg-3">Ações</div>
                </div>
            </li>

            @foreach ($classes as $classe)
            <!-- Item da Lista -->
            <li class="list-group-item">
            <div class="row flex-nowrap overflow-auto">
                <div class="col-lg-3">{{$classe->title}}</div>
                <div class="col-lg-6">{{$classe->teacher}}</div>
                <div class="col-lg-3">
                    @can('settings-users')
                    <a href="{{route('admin.classe.edit', ['id' => $classe->id])}}" class="btn btn-primary btn-sm">Editar</a>
                    @endcan
                </div>
            </div>
            </li>
            @endforeach
        </ul>
        {{ $classes->links() }}
        @else
        <p>Não existem turmas cadastradas.</p>
        @endif
    </div>
@endsection
