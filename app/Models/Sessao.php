<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{Filme, Sala};

class Sessao extends Model
{
  protected $table = 'sessao';

  public $timestamps = false;

  protected $fillables = [
    'filme_id',
    'sala_id',
    'horario'
  ];

  public function filme()
  {
    $this->belongsTo(Filme::class);
  }

  public function sala()
  {
    $this->belongsTo(Sala::class);
  }
}
