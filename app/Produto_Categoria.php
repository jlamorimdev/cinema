<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto_Categoria extends Model
{
  protected $table = 'produto_categoria';

  public $timestamps = false;

  protected $fillable = [
    'nome'
  ];
}
