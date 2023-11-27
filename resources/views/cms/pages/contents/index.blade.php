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
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Buscar Conteudo" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>

                @if(request()->filled('search'))
                <a href="{{route('admin.contents.index')}}" class="btn btn-success my-2 my-sm-0" >Limpar Buscar</a>
                @endif
            </form>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{route('admin.content.create')}}" class="btn btn-primary" type="button">+ Novo Conteudo</a>
        </div>
    </div>

    <div class="row mt-4">
        @if (isset($contents) && !empty($contents))
        <ul class="list-group col-12">
            <!-- Cabeçalho da Lista -->
            <li class="list-group-item">
                <div class="row font-weight-bold flex-nowrap overflow-auto">
                <div class="col-lg-3">Titulo</div>
                <div class="col-lg-3">Autor</div>
                <div class="col-lg-3">Tipo de Conteudo</div>
                <div class="col-lg-3">Ações</div>
                </div>
            </li>

            @foreach ($contents as $content)
            <!-- Item da Lista -->
            <li class="list-group-item">
            <div class="row flex-nowrap overflow-auto">
                <div class="col-lg-3">{{$content->title}}</div>
                <div class="col-lg-3">{{$content->author }}</div>
                <div class="col-lg-3">{{$content->type->title }}</div>
                <div class="col-lg-3">
                    <a href="{{route('admin.content.edit', ['id' => $content->id])}}" class="btn btn-primary btn-sm">Editar</a>
                </div>
            </div>
            </li>
            @endforeach
        </ul>
        {{ $contents->links() }}
        @else
        <p>Não existem Conteudo cadastrados.</p>
        @endif
    </div>
@endsection
