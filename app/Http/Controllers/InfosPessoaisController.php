<?php

namespace App\Http\Controllers;

use App\Models\InfosPessoais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfosPessoaisController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make(
            $request->only([
                'nome_pes',
                'cargo',
                'sobre',
                'localizacao',
                'email'
            ]),
            [
                'nome_pes' => 'required|string',
                'cargo' => 'required|string',
                'sobre' => 'required|string',
                'localizacao' => 'required|string',
                'email' => 'required|string|email'
            ],
            [
                'nome_pes.required' => 'O Nome é um campo obrigatório!',
                'nome_pes.string' => 'O Nome deve ser enviado em string!',
                'cargo.required' => 'O Cargo é um campo obrigatório!',
                'cargo.string' => 'O Cargo deve ser enviado em string!',
                'localizacao.required' => 'O Localização é um campo obrigatório!',
                'localizacao.string' => 'O Localização deve ser enviado em string!',
                'email.required' => 'O Email é um campo obrigatório!',
                'email.string' => 'O Email deve ser enviado em string!',
                'email.email' => 'Email informado com erro!'
            ]
        );

        if($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()], 400);
        }

        $nome_pes = $request->input('nome_pes');
        $cargo = $request->input('cargo');
        $sobre = htmlentities($request->input('sobre'));
        $localizacao = $request->input('localizacao');
        $email = $request->input('email');

        InfosPessoais::create([
            'nome_pes' => $nome_pes,
            'cargo' => $cargo,
            'sobre' => $sobre,
            'localizacao' => $localizacao,
            'email' => $email
        ]);

        return response()->json(null, 201);
    }

    public function avatar(Request $request)
    {
        $request->file('avatar')->storeAs('public/img', 'avatar.png');

        return response()->json(null, 201);
    }

    public static function selectInfo()
    {
        $infos = InfosPessoais::first(['nome_pes', 'cargo', 'sobre', 'localizacao', 'email']);

        return [
            'nome_pes' => $infos['nome_pes'],
            'cargo' => $infos['cargo'],
            'sobre' => html_entity_decode($infos['sobre']),
            'localizacao' => $infos['localizacao'],
            'email' => $infos['email']
        ];
    }
}
