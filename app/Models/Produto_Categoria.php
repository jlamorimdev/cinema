<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Produto_Categoria extends Model
{
  protected $table = 'produto_categoria';

  public $timestamps = false;

  protected $fillable = [
    'nome'
  ];

  public function produtos()
  {
    return $this->hasMany(Produto::class);
  }
}
