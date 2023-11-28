<?php

namespace App\Http\Controllers\CmsControllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    private $dadosPagina;

    public function __construct() {

    }

    public function index() {
        $this->dadosPagina['tituloPagina'] = 'Todas os Serviços';
        $this->dadosPagina['services'] = Service::paginate(10);
        return view('cms.pages.services.index', $this->dadosPagina);
    }
}
