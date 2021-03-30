<?php

namespace App\Http\Controllers;

use App\Models\ServicosExperiencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicosExperienciasController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make(
            $request->only([
                'descricao_serv',
                'id_experiencia'
            ]),
            [
                'descricao_serv' => 'required',
                'id_experiencia' => 'required'
            ],
            [
                'descricao_serv.required' => 'A descrição é um campo obrigatório!',
                'id_experiencia.required' => 'O id é um campo obrigatório!'
            ]
        );

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()], 400);
        }

        $descricao_serv = $request->input('descricao_serv');
        $id_experiencia = $request->input('id_experiencia');

        ServicosExperiencias::create([
            'descricao_serv' => $descricao_serv,
            'id_experiencia' => $id_experiencia
        ]);

        return response()->json(null, 201);
    }
}
