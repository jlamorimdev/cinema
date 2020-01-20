<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto_Categoria extends Model
{
  $table = 'produto_categoria';

  public $timestamps = false;

  protected $fillable = [
    'nome'
  ];
}
