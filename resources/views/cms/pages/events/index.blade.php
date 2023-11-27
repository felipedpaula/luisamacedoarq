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
        <div class="col-md-8 px-0">
            <form class="form-inline" id="formBusca" method="get" action="{{Request::url()}}" >
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Buscar Evento" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>

                @if(request()->filled('search'))
                <a href="{{route('admin.events.index')}}" class="btn btn-success my-2 my-sm-0" >Limpar Buscar</a>
                @endif
            </form>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{route('admin.event.create')}}" class="btn btn-primary" type="button">+ Novo Evento</a>
        </div>
    </div>

    <div class="row mt-4">
        @if (isset($events) && !empty($events))
        <ul class="list-group col-12">
            <!-- Cabeçalho da Lista -->
            <li class="list-group-item">
                <div class="row font-weight-bold flex-nowrap overflow-auto">
                <div class="col-lg-3">Titulo</div>
                <div class="col-lg-3">Data Inicial</div>
                <div class="col-lg-3">Data Final</div>
                <div class="col-lg-3">Ações</div>
                </div>
            </li>

            @foreach ($events as $event)
            <!-- Item da Lista -->
            <li class="list-group-item">
            <div class="row flex-nowrap overflow-auto">
                <div class="col-lg-3">{{$event->title}}</div>
                <div class="col-lg-3">{{ isset($event->date_start) === true ? date('d/m/Y H:i', strtotime($event->date_start)) : '' }}</div>
                <div class="col-lg-3">{{ isset($event->date_end) === true ? date('d/m/Y H:i', strtotime($event->date_end)) : '' }}</div>
                <div class="col-lg-3">
                    <a href="{{route('admin.event.edit', ['id' => $event->id])}}" class="btn btn-primary btn-sm">Editar</a>
                </div>
            </div>
            </li>
            @endforeach
        </ul>
        {{ $events->links() }}
        @else
        <p>Não existem Eventos cadastrados.</p>
        @endif
    </div>
@endsection
