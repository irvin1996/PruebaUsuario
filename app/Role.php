<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=['nombre','permission'];

    public function users()
{
    return $this->hasMany('App\User\idRole');
}

public function tieneAcceso( array $permisos){
  //ME Envian un array con los permisos
  //Los recorro y verifico si tiene permiso
  foreach ($permisos as $permiso) {
    if($this->tienePermiso($permiso)){
      return true;
    }
  }
  return false;
}

    protected function tienePermiso(string $permiso){
      //json_decode: cuando lo decodifica lo convierte en un array
      $listaPermisos=json_decode($this->permissions,true);//obtiene todos los permisos de un role
      return $listaPermisos[$permiso]??false; //verifica si tiene un indice con el permiso que le estoy enviando, si el permiso esta devuelve verdadero

    }
}
