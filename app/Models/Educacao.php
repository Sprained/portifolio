<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'titulo', 'subtitulo', 'status', 'data_inicio', 'data_final', 'descricao'
    ];

    protected $table = 'educacao';

    public $timestamps = false;
}
