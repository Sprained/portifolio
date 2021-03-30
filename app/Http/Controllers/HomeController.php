<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('portifolio', [
            'info' => InfosPessoaisController::selectInfo(),
            'midias' => MidiaSociaisController::select(),
            'git' => MidiaSociaisController::selectGit(),
            'skills' => HabilidadeController::select(),
            'educacoes' => EducacaoController::select(),
            'projetos' => ProjetosController::select()
        ]);
    }
}
