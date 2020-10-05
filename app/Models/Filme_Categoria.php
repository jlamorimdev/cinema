<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Filme;

class Filme_Categoria extends Model
{
  protected $table = 'filme_categoria';

  public $timestamps = false;

  protected $fillable = [
    'nome'
  ];

  public function filmes()
  {
    $this->hasMany(Filme::class);
  }
}
