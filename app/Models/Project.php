<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'data_inicio',
        'status',

    ]
}
