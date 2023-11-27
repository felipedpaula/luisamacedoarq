<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoRecebido;
use App\Models\Contato;
use Illuminate\Http\Request;
use Exception;

class ContatoController extends Controller
{
    public function index() {
        return view('site.pages.contato.index');
    }

    public function sendMessage(Request $request) {
        // Validação dos dados do formulário
        $dados = $request->validate([
            'name' => 'required|max:255',
            'email' => 'nullable|email',
            'tel' => 'nullable',
            'message' => 'required',
            'type' => 'required'
        ]);

        try {
            Contato::create($dados);
        } catch (Exception $e) {
            return back()->with('error', 'Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente.');
        }

        Mail::to('contato@email.com')->send(new ContatoRecebido($dados));
        return back()->with('success', 'Sua mensagem foi enviada com sucesso!');
    }
}
