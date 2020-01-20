<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $table = 'filme';
    public $timestamps = false;

    protected $fillable = [
      'nome',
      'categoria_id',
      'duracao',
      'tresd',
      'banner'
    ];
}
