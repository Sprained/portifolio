<?php

namespace App\Http\Controllers;

use App\Models\Experiencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExperienciasController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make(
            $request->only([
                'titulo',
                'subtitulo',
                'ano_inicio',
                'ano_finalizacao',
                'descricao'
            ]),
            [
                'titulo' => 'required',
                'subtitulo' => 'required',
                'ano_inicio' => 'required'
            ],
            [
                'titulo.required' => 'O titulo é um campo obrigatório!',
                'subtitulo.required' => 'O subtitulo é um campo obrigatório!',
                'ano_inicio.required' => 'O ano de inicio é um campo obrigatório!'
            ]
        );

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()], 400);
        }

        $titulo = $request->input('titulo');
        $subtitulo = $request->input('subtitulo');
        $ano_inicio = $request->input('ano_inicio');
        $ano_finalizacao = $request->input('ano_finalizacao');
        $descricao = $request->input('descricao');

        Experiencias::create([
            'titulo' => $titulo,
            'subtitulo' => $subtitulo,
            'ano_inicio' => $ano_inicio,
            'ano_finalizacao' => $ano_finalizacao,
            'descricao' => $descricao
        ]);

        return response()->json(null, 201);
    }

    public static function select()
    {
        return Experiencias::with('servicos')->get();
    }
}
