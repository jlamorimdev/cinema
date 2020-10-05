<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto_Categoria;

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

  public function categoria()
  {
    return $this->belongsTo(Produto_Categoria::class);
  }
}
