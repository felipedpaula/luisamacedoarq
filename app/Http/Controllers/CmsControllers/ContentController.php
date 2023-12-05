<?php

namespace App\Http\Controllers\CmsControllers;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\TypeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    private $dadosPagina;

    public function index(Request $request)
    {
        $this->dadosPagina['tituloPagina'] = 'Todos os Conteúdos';
        $this->dadosPagina['contents'] = Content::with('type')->where(function($query){
             if(request()->filled('search')){
                $query->Where('title', 'LIKE','%'. request()->get('search') .'%');
             }
        })->paginate(10);

        return view('cms.pages.contents.index',$this->dadosPagina);
    }

    public function register(Request $request)
    {
        $this->dadosPagina['tituloPagina'] = 'Registro de Conteúdo';
        $this->dadosPagina['contentTypes'] = TypeContent::all();

        return view('cms.pages.contents.register',$this->dadosPagina);
    }

    public function store(Request $request)
    {

        $data = $request->only([
            'title',
            'subtitle',
            'resume',
            'body',
            'author',
            'type_id',
            'status',
        ]);

        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:contents,slug'],
            'subtitle' => ['required', 'string'],
            'resume' => ['required', 'string'],
            'body' => ['required', 'string'],
            'author' => ['required', 'string'],
            'type_id' => ['required'],
            'status' => ['required', 'in:0,1'],
        ];

        if($request->file('img_default')){
            $path =  Storage::disk('public')->put('/images', $request->file('img_default'));
            $data['img_default']= Storage::url($path);

        }else{
            $data['img_default']= null ;
        }

        $data['slug'] = Str::slug($request->title);
        $validator = Validator::make($data, $rules);
        if($validator->fails()) {
            return redirect()->route('admin.content.create')
            ->withErrors($validator)
            ->withInput();
        }

        try {
            $content = new Content([
                'title' => $data['title'],
                'slug' => $data['slug'],
                'subtitle' => $data['subtitle'],
                'resume' =>  $data['resume'],
                'body' =>  $data['body'],
                'type_id' => $data['type_id'],
                'author' => $data['author'],
                'status' => $data['status'],
                'img_default' => $data['img_default']
            ]);

            $content->save();

            return redirect()->route('admin.contents.index')->with('success', 'Conteúdo criado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->route('admin.content.create')->with('errors', 'Ocorreu um erro ao criar o Conteudo. Por favor, tente novamente.');
        }
    }

    public function edit(Request $request)
    {
                $idContent = $request->id;
                $content = Content::findOrFail($idContent);
                $contentTypes = TypeContent::all();
                $this->dadosPagina = [
                    'content' => $content,
                    'tituloPagina' => 'Editar Conteudo: #'.$content->id,
                    'contentTypes' => $contentTypes
                ];

                return view('cms.pages.contents.edit', $this->dadosPagina);
    }

    public function update(Request $request, $id) {
        $content = Content::findOrFail($id);

        $data = $request->only([
            'title',
            'subtitle',
            'resume',
            'body',
            'author',
            'type_id',
            'status',
        ]);

        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string'],
            'resume' => ['required', 'string'],
            'body' => ['required', 'string'],
            'author' => ['required', 'string'],
            'type_id' => ['required'],
            'status' => ['required', 'in:0,1'],
        ];

        // Verificar se um novo arquivo foi enviado
        if($request->hasFile('img_default')) {
            // Remover a imagem anterior (opcional)
            $existingImage = $content->img_default;
            if ($existingImage) {
                Storage::disk('public')->delete($existingImage);
            }
            // Armazenar a nova imagem
            $path = Storage::disk('public')->put('/images', $request->file('img_default'));
            $data['img_default'] = Storage::url($path);
        }else{
            // Caso contrário, manter a imagem existente
            unset($data['img_default']);
        }

        $data['slug'] = Str::slug($request->title);
        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            return redirect()->route('admin.content.edit', ['id' => $id])
            ->withErrors($validator)
            ->withInput();
        }

        try {
            $content->update($data);
            return redirect()->route('admin.contents.index')->with('success', 'Conteudo Alterado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.content.edit', ['id' => $id])
            ->with('error', 'Ocorreu um erro ao atualizar o Conteudo. Por favor, tente novamente.');

        }

    }

    public function delete($id)
    {
        $content = Content::findOrFail($id);
        try {
            $content->delete();
            return redirect()->route('admin.contents.index')->with('success', 'Conteudo excluído com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('admin.content.index')->with('error', 'Erro ao tentar excluir o Conteudo.');
        }

    }
}
