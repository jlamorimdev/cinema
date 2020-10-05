<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Filme_Categoria;

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

  public function categoria()
  {
    $this->belongsTo(Filme_Categoria::class);
  }
}
