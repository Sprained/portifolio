<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    public function login(Request $request)
    {
        $validate = Validator::make(
            $request->only([
                'email', 'senha'
            ]),
            [
                'email' => 'required|string|email',
                'senha' => 'required|string'
            ],
            [
                'email.required' => 'O Email é um campo obrigatório!',
                'email.string' => 'O Email deve ser enviado em string!',
                'email.email' => 'Email informado com erro!',
                'senha.required' => 'O Senha é um campo obrigatório!',
                'senha.string' => 'O Senha deve ser enviado em string!',
            ]
        );

        if($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()], 400);
        }

        $email = $request->input('email');
        $senha = md5($request->input('senha'));

        $user = Usuarios::where('email', $email)->where('senha', $senha)->first(['id']);
        if(!isset($user['id'])) {
            return response()->json(['message' => 'Email ou senha invalidos!']);
        }

        session()->put('user', ['id' => $user['id']]);

        return response()->json(null, 200);
    }
}
