<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [App\Http\Controllers\SessionController::class, 'login']);

Route::group(['middleware' => ['auth']],  function() {
    Route::post('/infos', [App\Http\Controllers\InfosPessoaisController::class, 'register']);

    Route::post('/avatar', [App\Http\Controllers\InfosPessoaisController::class, 'avatar']);

    Route::post('/midias', [App\Http\Controllers\MidiaSociaisController::class, 'register']);

    Route::post('/skill', [App\Http\Controllers\HabilidadeController::class, 'register']);

    Route::post('/educacao', [App\Http\Controllers\EducacaoController::class, 'register']);

    Route::post('/tag', [App\Http\Controllers\TagsController::class, 'register']);
    Route::get('/tag', [App\Http\Controllers\TagsController::class, 'select']);

    Route::post('/projeto', [App\Http\Controllers\ProjetosController::class, 'register']);
    Route::get('/projeto', [App\Http\Controllers\ProjetosController::class, 'select']);

    Route::post('/experiencia', [App\Http\Controllers\ExperienciasController::class, 'register']);
});