<?php

namespace App\Http\Controllers\CmsControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $dadosPagina;

    public function index(Request $request) {
        $this->dadosPagina['tituloPagina'] = 'Dashboard';
        return view('cms.pages.dashboard.index', $this->dadosPagina);
    }
}
