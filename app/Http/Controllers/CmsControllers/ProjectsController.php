<?php

namespace App\Http\Controllers\CmsControllers;

use App\Http\Controllers\Controller;
use App\Models\ImageProjects;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    private $dadosPagina;
    private $projeto;
    private $projetos;
    private $imgProjeto;

    public function __construct() {
        $this->projeto = new Project();
        $this->imgProjeto = new ImageProjects();
    }

    public function index() {
        $this->dadosPagina['tituloPagina'] = 'Todos os Projetos';
        $this->dadosPagina['projetos'] = Project::paginate(10);
        return view('cms.pages.projetos.index', $this->dadosPagina);
    }

    public function register() {
        $this->dadosPagina['tituloPagina'] = 'Novo Projeto';
        return view('cms.pages.projetos.register', $this->dadosPagina);
    }

    public function store(Request $request)
    {

        $data = $request->only([
            'title',
            'resume',
            'body',
            'img_default',
            'url_link',
            'status',
        ]);

        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'resume' => ['required', 'string'],
            'body' => ['required', 'string'],
            'url_link' => ['string'],
            'status' => ['required', 'in:0,1'],
        ];

        if($request->file('img_default')){
            $path =  Storage::disk('public')->put('/images/content', $request->file('img_default'));
            $data['img_default']= Storage::url($path);

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

            $project = new Project([
                'title' => $data['title'],
                'resume' =>  $data['resume'],
                'body' =>  $data['body'],
                'url_link' => $data['url_link'],
                'status' => $data['status'],
                'img_default' => $data['img_default']
            ]);

            $project->save();

            return redirect()->route('admin.project.index')->with('success', 'Projeto criado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->route('admin.project.create')->with('errors', 'Ocorreu um erro ao criar o Projeto. Por favor, tente novamente.');
        }
    }
}
