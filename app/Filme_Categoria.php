<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme_Categoria extends Model
{
  protected $table = 'filme_categoria';

  public $timestamps = false;

  protected $fillable = [
    'nome'
  ];
}
