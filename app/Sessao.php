<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    protected $table = 'sessao';
    public $timestamps = false;

    protected $fillables = [
      'filme_id',
      'sala_id',
      'horario'
    ];
}
