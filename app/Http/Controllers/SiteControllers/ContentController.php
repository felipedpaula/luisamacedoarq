<?php

namespace App\Http\Controllers\SiteControllers;
use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    private $post;
    private $posts;
    private $dadosPagina;

    public function __construct() {
        $this->post = new Content();
        $this->posts = new Content();
    }

    public function index() {
        $this->dadosPagina['posts'] = Content::all();
        return view('site.pages.blog.index', $this->dadosPagina);
    }

    public function single($slug) {

        $this->dadosPagina['post'] = Content::where('slug', $slug)->firstOrFail();

        // Passa o conteúdo para a view
        return view('site.pages.blog.single',  $this->dadosPagina);
    }
}
