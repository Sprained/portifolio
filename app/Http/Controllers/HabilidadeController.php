<?php

namespace App\Http\Controllers;

use App\Models\Habilidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HabilidadeController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make(
            $request->only([
                'nome_hab',
                'nivel',
                'barra_progresso',
                'descricao'
            ]),
            [
                'nome_hab' => 'required|string',
                'nivel' => 'required|string',
                'barra_progresso' => 'required|int'
            ],
            [
                'nome_hab.required' => 'O Nome é um campo obrigatório!',
                'nome_hab.string' => 'O Nome deve ser enviado em string!',
                'nivel.required' => 'O Nivel é um campo obrigatório!',
                'nivel.string' => 'O Nivel deve ser enviado em string!',
                'barra_progresso.required' => 'O barra é um campo obrigatório!',
                'barra_progresso.int' => 'O barra deve ser enviado em int!',
            ]
        );

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()], 400);
        }

        $nome_hab = $request->input('nome_hab');
        $nivel = $request->input('nivel');
        $descricao = $request->input('descricao');
        $barra_progresso = $request->input('barra_progresso');

        Habilidade::create([
            'nome_hab' => $nome_hab,
            'nivel' => $nivel,
            'barra_progresso' => $barra_progresso,
            'descricao' => $descricao
        ]);

        return response()->json(null, 201);
    }

    public static function select()
    {
        return Habilidade::all(['nome_hab', 'nivel', 'barra_progresso', 'descricao'])->orderBy('barra_progresso', 'DESC');
    }
}
