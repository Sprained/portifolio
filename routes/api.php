<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [App\Http\Controllers\SessionController::class, 'login']);

Route::group(['middleware' => ['auth']],  function() {
    Route::post('/infos', [App\Http\Controllers\InfosPessoaisController::class, 'register']);

    Route::post('/avatar', [App\Http\Controllers\InfosPessoaisController::class, 'avatar']);

    Route::post('/midias', [App\Http\Controllers\MidiaSociaisController::class, 'register']);
});