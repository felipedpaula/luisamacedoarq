<?php

namespace App\Http\Controllers\CmsControllers;

use App\Http\Controllers\Controller;
use App\Models\Contato;
use Illuminate\Http\Request;
use Exception;

class ContatoController extends Controller
{
    private $dadosPagina;

    public function index() {
        $this->dadosPagina['tituloPagina'] = 'Mensagens de Contato';
        return view('cms.pages.contatos.index', $this->dadosPagina);
    }
}
