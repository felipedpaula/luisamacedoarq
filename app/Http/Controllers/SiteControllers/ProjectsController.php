<?php

namespace App\Http\Controllers\SiteControllers;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    private $projeto;
    private $projetos;
    private $dadosPagina;

    public function __construct() {
        $this->projeto = new Project();
        $this->projetos = new Project();
    }

    public function index() {
        $this->dadosPagina['projetos'] = Project::all();
        return view('site.pages.projetos.index', $this->dadosPagina);
    }

    public function single($id) {

        $this->dadosPagina['projeto'] = Project::findOrFail($id);

        // Passa o conteúdo para a view
        return view('site.pages.projetos.single',  $this->dadosPagina);
    }
}
