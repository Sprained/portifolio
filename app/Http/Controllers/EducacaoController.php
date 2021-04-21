<?php

namespace App\Http\Controllers;

use App\Models\Educacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducacaoController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make(
            $request->only([
                'titulo',
                'subtitulo',
                'status',
                'data_inicio',
                'data_final',
                'descricao'
            ]),
            [
                'titulo' => 'required',
                'subtitulo' => 'required',
                'status' => 'required'
            ],
            [
                'titulo.required' => 'O Titulo é um campo obrigatório!',
                'subtitulo.required' => 'O Subtitulo é um campo obrigatório!',
                'status.required' => 'O Status é um campo obrigatório!'
            ]
        );

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()], 400);
        }

        $titulo = $request->input('titulo');
        $subtitulo = $request->input('subtitulo');
        $status = $request->input('status');
        $data_inicio = $request->input('data_inicio');
        $data_final = $request->input('data_final');
        $descricao = $request->input('descricao');

        Educacao::create([
            'titulo' => $titulo,
            'subtitulo' => $subtitulo,
            'status' => $status,
            'data_inicio' => $data_inicio,
            'data_final' => $data_final,
            'descricao' => $descricao
        ]);

        return response()->json(null, 201);
    }

    public static function select()
    {
        return Educacao::orderBy('id', 'DESC')->get([
            'id', 
            'titulo', 
            'subtitulo', 
            'status', 
            'data_inicio', 
            'data_final', 
            'descricao'
        ]);
    }
}
