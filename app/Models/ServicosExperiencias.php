<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicosExperiencias extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'descricao_serv', 'id_experiencia'
    ];

    protected $table = 'servicos_experiencias';

    public $timestamps = false;
}
