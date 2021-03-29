<?php

namespace App\Http\Controllers;

use App\Models\MidiaSociais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MidiaSociaisController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make(
            $request->only([
                'nome_mid', 'link_midia'
            ]),
            [
                'nome_mid' => 'required|string',
                'link_midia' => 'required|string'
            ],
            [
                'nome_mid.required' => 'O Nome é um campo obrigatório!',
                'nome_mid.string' => 'O Nome deve ser enviado em string!',
                'link_midia.required' => 'O Link é um campo obrigatório!',
                'link_midia.string' => 'O Link deve ser enviado em string!',
            ]
        );

        if($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()], 400);
        }

        $nome_mid = $request->input('nome_mid');
        $link_midia = $request->input('link_midia');

        MidiaSociais::create([
            'nome_mid' => $nome_mid,
            'link_midia' => $link_midia
        ]);

        return response()->json(null, 201);
    }

    public static function select()
    {
        return MidiaSociais::all(['id', 'nome_mid', 'link_midia']);
    }

    public static function selectGit()
    {
        return MidiaSociais::where('nome_mid', 'like', '%github%')->first(['link_midia']);
    }
}
