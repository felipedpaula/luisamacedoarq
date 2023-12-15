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

    <div class="row mt-4">
        @if (isset($clientes) && count($clientes) > 0)
        <ul class="list-group col-12">
            <!-- Cabeçalho da Lista -->
            <li class="list-group-item">
                <div class="row font-weight-bold flex-nowrap overflow-auto">
                <div class="col-lg-9">Nome</div>
                <div class="col-lg-3">Ações</div>
                </div>
            </li>

            @foreach ($clientes as $cliente)
            <!-- Item da Lista -->
            <li class="list-group-item">
            <div class="row flex-nowrap overflow-auto">
                <div class="col-lg-9">{{$cliente->name}}</div>
                <div class="col-lg-3">
                    <a href="{{route('admin.user.edit', ['id' => $cliente->id])}}" class="btn btn-primary btn-sm">Editar</a>
                </div>
            </div>
            </li>
            @endforeach
        </ul>
        {{ $clientes->links() }}
        @else
            <p>Sem clientes para visualizar.</p>
        @endif
    </div>
@endsection
