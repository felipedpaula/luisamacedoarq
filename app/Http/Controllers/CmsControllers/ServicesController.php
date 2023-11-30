<?php

namespace App\Http\Controllers\CmsControllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

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
}
