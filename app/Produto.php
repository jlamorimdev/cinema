<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';
    public $timestamps = false;

    protected $fillable = [
      'nome',
      'valor',
      'imagem',
      'categoria'
    ];
}
