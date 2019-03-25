<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     use SoftDeletes;
    protected $dates = ['deleted_at'];
  protected $fillable = [
      'identificacion','idPasaporte','name','apellido1','apellido2','fechaNacimiento','telefono','celular','email','direccion','idRole','password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     public function pasaportes()
     {
       return $this->belongsTo('App\Pasaporte','idPasaporte');
     }

      public function roles()
     {
       return $this->belongsTo('App\Role','idRole');
     }
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function destinos(){

return $this->belongsToMany('App\Destino','cliente_destinos','idUser','idDestino')->withTimestamps()->withPivot('cantidad');
}

    /*
    public function tieneAcceso(array $permisos){
    //Recibe un array de permisos
    //foreach($this->roles as $role){
      if($this->roles->tieneAcceso($permisos)){ //si tiene asociado ese permiso me retorna verdadero
        return true;
       }
  //   }
     return false;
 }

  public function tieneRol($nombre){
  return $this->roles()->where('name',$nombre)->count()==1;
}
*/
}
