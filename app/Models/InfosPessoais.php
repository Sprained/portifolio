<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfosPessoais extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'nome_pes', 'cargo', 'sobre', 'foto', 'localizacao', 'email'
    ];

    protected $table = 'infos_pessoais';

    public $timestamps = false;
}
