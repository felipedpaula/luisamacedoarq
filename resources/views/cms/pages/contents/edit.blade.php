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
                    Excluir Conteudo <i class="fa fa-trash" aria-hidden="true"></i>
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

    <form action="{{route('admin.content.update', ['id' => $content->id])}}" method="POST" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        @csrf
        <div class="row">
            <!-- Primeira Coluna -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="name">Título</label>
                    <input name="title" type="text" class="form-control texto-grande" id="title" value="{{isset($content->title) === true ? $content->title : ''}}">
                </div>
                <div class="form-group">
                    <label for="type_id">Tipo de Conteudo</label>
                    <select name="type_id" class="form-control" id="type_id">
                        @foreach ($contentTypes as $type)
                            <option value="{{$type->id}}"{{isset($content->type_id) === true && $content->type_id === $type->id ? 'selected="selected"' : ''}} >{{$type->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="resume">Resumo</label>
                    <textarea name="resume" id="resume" cols="30" rows="10" class="form-control">{{isset($content->resume) === true ? $content->resume : ''}}</textarea>
                </div>

                <div class="form-group">
                    <label for="img_default">Imagem</label>
                    @if($content->img_default != '')
                    <img  src="{{asset($content->img_default)}}" alt="preview" width="220px" height="300px" id="preview" class="img-fluid"/>
                    @else
                    <img  src="{{asset('assets/site/images/resource/news-1.jpg')}}" alt="preview" width="220px" height="300px" id="preview" class="img-fluid"/>
                    @endif
                    <input type="file" name="img_default" class="form-control" id="img_default">
                </div>

            </div>

            <!-- Segunda Coluna -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="subtitle">Subtítulo</label>
                    <input name="subtitle" type="text" class="form-control" id="subtitle" value="{{isset($content->subtitle) === true ? $content->subtitle : ''}}">
                </div>
                <div class="form-group">
                    <label for="author">Autor</label>
                    <input name="author" type="text" class="form-control" id="author" value="{{isset($content->author) === true ? $content->author : ''}}">
                </div>
                <div class="form-group">
                    <label for="body">Texto</label>
                    <textarea name="body" id="body" cols="30" rows="15" class="form-control texto-grande">{{isset($content->body) === true ? $content->body : ''}}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="0" {{isset($content->status) === true && $content->status === 0 ? 'selected="selected"' : ''}}>Ativado</option>
                        <option value="1" {{isset($content->status) === true && $content->status === 1 ? 'selected="selected"' : ''}}>Bloqueado</option>
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
					<form id="publicidadeExcluirForm" method="POST" action="{{route('admin.content.delete', ['id' => $content->id])}}">
						{{ method_field('DELETE') }}
						{{ csrf_field() }}
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">Excluir Conteudo</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							Você tem <b>certeza</b> que deseja excluir o Conteudo<b>"<span></span>"</b>?
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
