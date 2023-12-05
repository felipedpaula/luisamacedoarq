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
                    Excluir Destaque <i class="fa fa-trash" aria-hidden="true"></i>
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

    <form action="{{route('admin.destaque.update',['id' => $destaque->id])}}" method="POST" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        @csrf
        <div class="row">
            <!-- Primeira Coluna -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="name">Título</label>
                    <input name="title" type="text" class="form-control" id="title"
                    value="{{isset($destaque->title) === true ? $destaque->title : ''}}"
                    >
                </div>

                <div class="form-group">
                    <label for="date_start">Data Inicial</label>
                    <input name="date_start" type="text" class="form-control date-time" autocomplete="off" id="date_start"
                    value="{{ isset($destaque->date_start) === true ? date('d/m/Y H:i', strtotime($destaque->date_start)) : '' }}"
                    >
                </div>

                <div class="form-group">
                    <label for="url_link">Link</label>
                    <input name="url_link" type="text" class="form-control" id="url_link"
                    value="{{isset($destaque->url_link) === true ? $destaque->url_link : ''}}"
                    >
                </div>


                <div class="form-group">
                    <label for="type_id">Categoria de Destaque</label>
                    <select name="categoria_id" class="form-control" id="categoria_id">
                        @foreach ($destaqueCategorias as $categoria)
                            <option value="{{$categoria->id}}"
                                {{isset($destaque->categoria_id) === true && $destaque->categoria_id === $categoria->id ? 'selected="selected"' : ''}}
                            >
                            {{$categoria->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="img_src">Imagem</label>
                    <img src="{{asset($destaque->img_src)}}" alt="preview" width="220px" height="300px" id="preview" class="img-fluid"/>
                    <input type="file" name="img_src" class="form-control" id="img_src">
                </div>

            </div>

            <!-- Segunda Coluna -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="subtitle">Subtítulo</label>
                    <input name="subtitle" type="text" class="form-control" id="subtitle"
                    value="{{isset($destaque->subtitle) === true ? $destaque->subtitle : ''}}"
                    >
                </div>

                <div class="form-group">
                    <label for="texto">Data Final</label>
                    <input name="date_end" type="text" class="form-control date-time" autocomplete="off" id="date_end"
                    value="{{ isset($destaque->date_end) === true ? date('d/m/Y H:i', strtotime($destaque->date_end)) : '' }}"
                    >
                </div>

                <div class="form-group">
                    <label for="txt_link">Texto do Link</label>
                    <input name="txt_link" type="text" class="form-control" id="txt_link" value="{{isset($destaque->txt_link) === true ? $destaque->txt_link : ''}}">
                </div>

                <div class="form-group">
                    <label for="texto">Texto</label>
                    <textarea name="body" id="body" cols="30" rows="15" class="form-control texto-grande">
                        {!! isset($destaque->body) === true ? $destaque->body : '' !!}
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="order">Ordem</label>
                    <input name="order" type="Number" class="form-control " id="order" min="0" value="{{isset($destaque->order) === true ? $destaque->order : ''}}">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="1" {{isset($destaque->status) === true && $destaque->status === 1 ? 'selected="selected"' : ''}}>Ativado</option>
                        <option value="0" {{isset($destaque->status) === true && $destaque->status === 0 ? 'selected="selected"' : ''}}>Bloqueado</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Botão de Submissão -->
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>

    <!-- Modal -->
		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<form id="publicidadeExcluirForm" method="POST" action="{{route('admin.destaque.delete', ['id' => $destaque->id])}}">
						{{ method_field('DELETE') }}
						{{ csrf_field() }}
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">Excluir Conteudo</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							Você tem <b>certeza</b> que deseja excluir o Destaque<b>"<span></span>"</b>?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							<button type="submit" class="btn btn-danger">Excluir</button>
						</div>
					</form>
				</div>
			</div>
		</div>


    <script>
            function readImage() {
                if (this.files && this.files[0]) {
                    var file = new FileReader();
                    file.onload = function(e) {
                        document.getElementById("preview").src = e.target.result;
                    };
                    file.readAsDataURL(this.files[0]);
                }
            }

            document.getElementById("img_default").addEventListener("change", readImage, false);

    </script>


@endsection
