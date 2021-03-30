<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projetos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'titulo', 'descricao', 'link'
    ];

    protected $table = 'projetos';

    public $timestamps = false;

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'projetos_tags', 'id_projeto', 'id_tag');
    }

    protected $hidden = ['pivot'];
}
