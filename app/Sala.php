<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = 'sala';
    public $timestamps = false;

    protected $fillables = [
      'nome',
      'capacidade'
    ];
}
