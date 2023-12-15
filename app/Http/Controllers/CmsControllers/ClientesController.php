<?php

namespace App\Http\Controllers\CmsControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class ClientesController extends Controller
{
    private $dadosPagina;
    private $clientes;

    public function __construct() {
        $this->clientes = new User();
    }

    public function index() {
        $this->dadosPagina['tituloPagina'] = 'Todos os Clientes';
        $this->dadosPagina['clientes'] = $this->clientes->getClientes();
        return view('cms.pages.clientes.index', $this->dadosPagina);
    }
}
