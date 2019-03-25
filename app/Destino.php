<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];
protected $fillable = [ 'idPais','lugar','tourDescripcion','fechaIda','fechaLlegada'];

    public function paises()
   {
     return $this->belongsTo('App\Pais','idPais');
   }
   public function usuarioF(){
   return $this->belongsToMany('App\User','cliente_destinos','idDestino','idUser')->withTimestamps()->withPivot('cantidad');
   }

}
