<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'id', 'descricao', 'class_css', 'prioridade'
    ];

    protected $table = 'tags';

    public $timestamps = false;

    public function projetos()
    {
        return $this->belongsToMany(Projetos::class, 'projetos_tags',  'id_projeto', 'id_tag');
    }

    protected $hidden = ['pivot'];
}
