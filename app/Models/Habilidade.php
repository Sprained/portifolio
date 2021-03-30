<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'nome_hab', 'descricao', 'nivel', 'barra_progresso'
    ];

    protected $table = 'habilidades';

    public $timestamps = false;
}
