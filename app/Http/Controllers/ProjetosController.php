<?php

namespace App\Http\Controllers;

use App\Models\Projetos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjetosController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make(
            $request->only([
                'titulo',
                'descricao',
                'link',
                'tags'
            ]),
            [
                'titulo' => 'required',
                'descricao' => 'required',
                'tags' => 'required'
            ],
            [
                'titulo.required' => 'O titulo é um campo obrigatório!',
                'descricao.required' => 'A descrição é um campo obrigatório!',
                'tags.required' => 'As tags são obrigatória!'
            ]
        );

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()], 400);
        }

        $titulo = $request->input('titulo');
        $descricao = $request->input('descricao');
        $link = $request->input('link');
        $tags = $request->input('tags');

        Projetos::create([
            'titulo' => $titulo,
            'descricao' => $descricao,
            'link' => $link
        ])->tags()->attach($tags);

        return response()->json(null, 201);
    }

    public static function select()
    {
        $projects = Projetos::orderBy('id', 'DESC')->take(10)->get();

        $arr = [];
        foreach($projects as $project) {
            array_push($arr, [ 
                'id' => $project['id'],
                'titulo' => $project['titulo'],
                'descricao' => $project['descricao'],
                'link' => isset($project['link']) ? $project['link'] : null,
                'tags' => $project->tags()->orderBy('prioridade', 'ASC')->get(['tags.id', 'tags.descricao', 'tags.class_css'])
            ]);
        }

        return $arr;
    }
}
