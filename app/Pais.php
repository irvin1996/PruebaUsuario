<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];
  protected $fillable=['nombrePais'];

  public function destinoPais()
{
  return $this->hasMany('App\Destino\idPais');
}
}
