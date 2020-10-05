<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sessao;

class Sala extends Model
{
  protected $table = 'sala';

  public $timestamps = false;

  protected $fillables = [
    'nome',
    'capacidade'
  ];

  public function sessoes()
  {
    $this->hasMany(Sessao::class);
  }
}
