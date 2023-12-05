<?php

namespace App\Http\Controllers\SiteControllers;
use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Destaque;
use App\Models\Event;
use App\Models\ImagemGaleria;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $destaques;
    private $posts;
    private $projects;
    private $dadosPagina;

    public function __construct() {
        $this->destaques = new Destaque();
        $this->posts = new Content();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->dadosPagina['destaques'] = $this->destaques->getDestaques('slider-home', 3);
        $this->dadosPagina['posts'] = $this->posts->getConteudosHome();

        return view('site.pages.home.index', $this->dadosPagina);
    }
}
