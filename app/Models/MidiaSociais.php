<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MidiaSociais extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'nome_mid', 'link_midia'
    ];

    protected $table = 'midias_sociais';

    public $timestamps = false;
}
