<?php

namespace App\Http\Controllers\SiteControllers;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    private $service;
    private $services;
    private $dadosPagina;

    public function __construct() {
        $this->service = new Service();
        $this->services = new Service();
    }

    public function index() {
        $this->dadosPagina['services'] = Service::all();
        return view('site.pages.services.index', $this->dadosPagina);
    }

    public function single($id) {

        $this->dadosPagina['service'] = Service::findOrFail($id);

        // Passa o conteúdo para a view
        return view('site.pages.services.single',  $this->dadosPagina);
    }
}
