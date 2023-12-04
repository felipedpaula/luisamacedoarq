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
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar serviço" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{route('admin.service.create')}}" class="btn btn-primary" type="button">+ Novo serviço</a>
        </div>
    </div>

    <div class="row mt-4">
        @if (isset($services) && count($services) > 0)
        <ul class="list-group col-12">
            <!-- Cabeçalho da Lista -->
            <li class="list-group-item">
                <div class="row font-weight-bold flex-nowrap overflow-auto">
                    <div class="col-lg-10">Título</div>
                    <div class="col-lg-2">Ações</div>
                </div>
            </li>

            @foreach ($services as $service)
            <!-- Item da Lista -->
            <li class="list-group-item">
            <div class="row flex-nowrap overflow-auto">
                <div class="col-lg-10">{{$service->title}}</div>
                <div class="col-lg-2">
                    <a href="{{route('admin.service.edit', ['id' => $service->id])}}" class="btn btn-primary btn-sm">Editar</a>
                </div>
            </div>
            </li>
            @endforeach
        </ul>

        {{ $services->links() }}

        @else
        <p>Não existem serviços cadastrados.</p>
        @endif
    </div>
@endsection
