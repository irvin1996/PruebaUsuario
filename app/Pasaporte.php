<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Pasaporte extends Model
{
  protected $fillable=['numeroPasaporte','fechaEmision','fechaVencimiento'];

  public function usuariosPasaporte()
{
  return $this->hasMany('App\User\idPasaporte');
}
}
