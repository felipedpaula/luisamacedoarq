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
        @if (isset($contatos) && !empty($contatos))

            {{ $contatos->links() }}
        @else
            <p>Sem mensagens para visualizar.</p>
        @endif
    </div>
@endsection
