<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencias extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'titulo', 'subtitulo', 'ano_inicio', 'ano_finalizacao', 'descricao'
    ];

    protected $table = 'experiencias';

    public $timestamps = false;

}
