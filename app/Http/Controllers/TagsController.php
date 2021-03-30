<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagsController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make(
            $request->only([
                'descricao',
                'class_css',
                'prioridade'
            ]),
            [
                'descricao' => 'required',
                'class_css' => 'required',
                'prioridade' => 'required'
            ],
            [
                'class_css.required' => 'A classe é um campo obrigatório!',
                'descricao.required' => 'A descrição é um campo obrigatório!',
                'prioridade.required' => 'A prioridade é um campo obrigatório!'
            ]
        );

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()], 400);
        }

        $descricao = $request->input('descricao');
        $class_css = $request->input('class_css');
        $prioridade = $request->input('prioridade');

        Tags::create([
            'descricao' => $descricao,
            'class_css' => $class_css,
            'prioridade' => $prioridade
        ]);

        return response()->json(null, 201);
    }

    public function select()
    {
        return response()->json(Tags::orderBy('prioridade', 'ASC')->get());
    }
}
