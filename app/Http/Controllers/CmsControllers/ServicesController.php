<?php

namespace App\Http\Controllers\CmsControllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    private $dadosPagina;
    private $service;
    private $services;

    public function __construct() {
        $this->service = new Service();
        $this->services = new Service();
    }

    public function index() {
        $this->dadosPagina['tituloPagina'] = 'Todos os Serviços';
        $this->dadosPagina['services'] = Service::paginate(10);
        return view('cms.pages.services.index', $this->dadosPagina);
    }

    public function register() {
        $this->dadosPagina['tituloPagina'] = 'Novo Serviço';
        return view('cms.pages.services.register', $this->dadosPagina);
    }

    public function store(Request $request)
    {

        $data = $request->only([
            'title',
            'resume',
            'body',
            'img_default',
            'status',
        ]);

        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'resume' => ['required', 'string'],
            'body' => ['required', 'string'],
            'status' => ['required', 'in:0,1'],
        ];

        if($request->file('img_default')){
            $img_default = $request->file('img_default')->store('public/images/services');
            $url = asset(Storage::url($img_default));
            $data['img_default']= Storage::url($url);

        }else{
            $data['img_default']= null ;
        }

        $validator = Validator::make($data, $rules);
        if($validator->fails()) {
            return redirect()->route('admin.content.create')
            ->withErrors($validator)
            ->withInput();
        }

        try {
            $project = new Service([
                'title' => $data['title'],
                'resume' =>  $data['resume'],
                'body' =>  $data['body'],
                'status' => $data['status'],
                'img_default' => $data['img_default']
            ]);

            $project->save();

            return redirect()->route('admin.services.index')->with('success', 'Serviço criado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->route('admin.service.create')->with('errors', 'Ocorreu um erro ao criar o Serviço. Por favor, tente novamente.');
        }
    }

    public function edit(Request $request) {
        $idService = $request->id;
        $service = Service::findOrFail($idService);

        $this->dadosPagina = [
            'service' => $service,
            'tituloPagina' => 'Editar Serviço: '.$service->title
        ];

        return view('cms.pages.services.edit', $this->dadosPagina);
    }

    public function update(Request $request, $id) {
        $service = Service::find($id);
        if (!$service) {
            return redirect()->route('admin.services.index')->with('error', 'Serviço não encontrado.');
        }

        $data = $request->only([
            'title',
            'resume',
            'body',
            'img_default',
            'status',
        ]);

        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'resume' => ['required', 'string'],
            'body' => ['required', 'string'],
            'status' => ['required', 'in:0,1'],
        ];

        if ($request->hasFile('img_default')) {
            $path = Storage::disk('public')->put('/images', $request->file('img_default'));
            $data['img_default'] = Storage::url($path);
        } else {
            unset($data['img_default']); // Não substituir a imagem se nenhuma nova for enviada
        }

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->route('admin.service.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $service->update([
                'title' => $data['title'],
                'resume' =>  $data['resume'],
                'body' =>  $data['body'],
                'status' => $data['status'],
                'img_default' => $data['img_default'] ?? $service->img_default
            ]);

            return redirect()->route('admin.services.index')->with('success', 'Serviço atualizado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->route('admin.service.edit', ['id' => $id])->with('error', 'Ocorreu um erro ao atualizar o Serviço. Por favor, tente novamente.');
        }
    }

    public function delete($id) {
        $service = Service::find($id);
        if (!$service) {
            return redirect()->route('admin.services.index')->with('error', 'Serviço não encontrado.');
        }

        try {

            $service->delete();

            return redirect()->route('admin.services.index')->with('success', 'Serviço removido com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.services.index')->with('error', 'Ocorreu um erro ao tentar remover o Serviço. Por favor, tente novamente.');
        }
    }


}
