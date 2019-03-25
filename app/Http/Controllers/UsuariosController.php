<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Destino;
use DB;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use App\Pasaporte;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{

public function byRoles(){
$Roles=Role::all();
return response()->json($Roles);
}

 public function getIndexUsuario(){

        $user = User::orderBy('identificacion','asc')->paginate(5);
        $roll=Role::all();
        $pasaporte=Pasaporte::all();
      //  $idRolBusc=-1;
    return view('Usuarios.Index',['us'=>$user,'ro'=>$roll,'pass'=>$pasaporte/*,'idRolBusc'=>$idRolBusc*/]);
}

  public function getUsuarioCreate(){
            $roll=Role::all();
            return view('Usuarios.create',['roles'=>$roll]);
          }

    public function postUsuarioCreate(Request $request)
  {

$guardarNumeroPasaporte=$request->input('pasaporte');
$a = $request->get('chkIdentificacion');
$r = $request->get('chkPasaporte');
$gFechaVecimiento=Carbon::parse($request->input('fechaVencimiento'));
$gfechaNacimiento=Carbon::parse($request->input('fechaNacimiento'));

if ($a==false && $r==false ) {
  return redirect()->back()->with('warning', 'Debe marcar Identificación o Pasaporte')->withInput();
} else if ($a==true && $r==false) {
if ($request->input('identificacion')==null || $request->input('identificacion')==" ") {

$this->validate($request, [
          'identificacion' => 'required|max:9|unique:users,identificacion',
        ]);

}else if ($gfechaNacimiento>Carbon::now()) {
return redirect()->back()->with('warning', 'La fecha de nacimiento no puede ser mayor a la del dia de hoy')->withInput();
}else{
$this->validate($request, [
          'nombre' => 'required|string|min:3|max:30',
          'apellido1' => 'required|string|min:3|max:20',
          'apellido2' => 'required|string|min:3|max:20',
          'fechaNacimiento' => 'required|date',
          'celular' => 'required|string|min:8|',
          'correo' => 'required|email|string|max:255|unique:users,email',
          'direccion' => 'required|string|max:500',
          'password' => 'required|string|confirmed',
        ]);
    $us = new User([
             'identificacion'=> $request->input('identificacion'),
             'name'=>$request->input('nombre'),
             'apellido1'=> $request->input('apellido1'),
             'apellido2'=> $request->input('apellido2'),
             'fechaNacimiento'=> $request->input('fechaNacimiento'),
             'telefono'=> $request->input('telefono'),
             'celular'=> $request->input('celular'),
             'email'=> $request->input('correo'),
             'direccion'=> $request->input('direccion'),
             'password'=> Hash::make( $request->input('password')),
        ]);
        $miRole=Role::find($request->input('idRole'));
        $us->roles()->associate($miRole);
        $us->save();
          return redirect()->route('usuario.index')->with('success', 'Usuario: ' . $request->input('nombre').' guardado correctamente');
}
}else if($r==true && $a==false){
  if ($request->input('pasaporte')==null || $request->input('pasaporte')==" " ||$request->input('fechaEmision')==null || $request->input('fechaVencimiento')==null) {
    $this->validate($request, [
      'pasaporte' => 'required|string|unique:pasaportes,numeroPasaporte',
      'fechaEmision' => 'required|date',
      'fechaVencimiento' => 'required|date',
              ]);
  }else if ($gfechaNacimiento>Carbon::now()) {
    return redirect()->back()->with('warning', 'La fecha de nacimiento no puede ser mayor a la del dia de hoy')->withInput();
  }else {
    $this->validate($request, [
                'nombre' => 'required|string|min:3|max:30',
                'apellido1' => 'required|string|min:3|max:20',
                'apellido2' => 'required|string|min:3|max:20',
                'fechaNacimiento' => 'required|date',
                'celular' => 'required|string|min:8|',
                'correo' => 'required|email|string|max:255|unique:users,email',
                'direccion' => 'required|string|max:500',
                'password' => 'required|string|confirmed',
              ]);

                $us = new User([
                         'name'=>$request->input('nombre'),
                         'apellido1'=> $request->input('apellido1'),
                         'apellido2'=> $request->input('apellido2'),
                         'fechaNacimiento'=> $request->input('fechaNacimiento'),
                         'telefono'=> $request->input('telefono'),
                         'celular'=> $request->input('celular'),
                         'email'=> $request->input('correo'),
                         'direccion'=> $request->input('direccion'),
                         'password'=> Hash::make( $request->input('password')),
                    ]);
                $passport=new Pasaporte([
                  'numeroPasaporte'=>$guardarNumeroPasaporte,
                  'fechaEmision'=>$request->input('fechaEmision'),
                  'fechaVencimiento'=>$request->input('fechaVencimiento'),
                ]);
            $passport->save();
            $miPassport=Pasaporte::Where('numeroPasaporte',$guardarNumeroPasaporte)->get()->first();
            $us->pasaportes()->associate($miPassport);
            $miRole=Role::find($request->input('idRole'));
            $us->roles()->associate($miRole);
            $us->save();
            return redirect()->route('usuario.index')->with('success', 'Usuario: ' . $request->input('nombre').' guardado correctamente');
}
}else if ($a==true && $r==true) {

$this->validate($request, [
            'identificacion' => 'required|max:9|unique:users,identificacion',
            'pasaporte' => 'required|string|unique:pasaportes,numeroPasaporte',
            'fechaEmision' => 'required|date',
            'fechaVencimiento' => 'required|date',
            'nombre' => 'required|string|min:3|max:30',
            'apellido1' => 'required|string|min:3|max:20',
            'apellido2' => 'required|string|min:3|max:20',
            'fechaNacimiento' => 'required|date',
            'celular' => 'required|string|min:8|',
            'correo' => 'required|email|string|max:255|unique:users,email',
            'direccion' => 'required|string|max:500',
            'password' => 'required|string|confirmed',
          ]);

          if ($gfechaNacimiento>Carbon::now()) {
            return redirect()->back()->with('warning', 'La fecha de nacimiento no puede ser mayor a la del dia de hoy')->withInput();
          }else {

                        $us = new User([
                                'identificacion'=> $request->input('identificacion'),
                                 'name'=>$request->input('nombre'),
                                 'apellido1'=> $request->input('apellido1'),
                                 'apellido2'=> $request->input('apellido2'),
                                 'fechaNacimiento'=> $request->input('fechaNacimiento'),
                                 'telefono'=> $request->input('telefono'),
                                 'celular'=> $request->input('celular'),
                                 'email'=> $request->input('correo'),
                                 'direccion'=> $request->input('direccion'),
                                 'password'=> Hash::make( $request->input('password')),
                            ]);
                        $passport=new Pasaporte([
                          'numeroPasaporte'=>$request->input('pasaporte'),
                          'fechaEmision'=>$request->input('fechaEmision'),
                          'fechaVencimiento'=>$request->input('fechaVencimiento'),
                        ]);
                    $passport->save();
                    $miPassport=Pasaporte::Where('numeroPasaporte',$request->input('pasaporte'))->get()->first();
                    $us->pasaportes()->associate($miPassport);
                    $miRole=Role::find($request->input('idRole'));
                    $us->roles()->associate($miRole);
                    $us->save();
                   return redirect()->route('usuario.index')->with('success', 'Usuario: ' . $request->input('nombre').' guardado correctamente');
        }
}
        }


public function getListadoUsuarios()
    {
      $Usuario=User::orderBy('identificacion','asc')->paginate(5);
      $Rol=Role::All();
      $Pasaport=Pasaporte::All();
    return view('Reportes.ListadoUsuarios',['usa'=>$Usuario,'rol'=>$Rol,'pasaporte'=>$Pasaport]);

    }

    public function getListadoPasaporteUsuarios()
        {
          $Usuario=User::orderBy('identificacion','asc')->paginate(5);
          $Rol=Role::All();
          $fechaActual=Carbon::now();
          $fechaMes=$fechaActual->format('m')+1;
          $fechaAno=$fechaActual->format('Y');
          $fechaDia=$fechaActual->format('d');
          $fechaCompleta="$fechaAno-$fechaMes-$fechaDia";
          $Pasaport=Pasaporte::whereDate('fechaVencimiento','=',$fechaCompleta)->get();

          return view('Reportes.ListadoUsuPasaporte',['usa'=>$Usuario,'rol'=>$Rol,'pasaporte'=>$Pasaport]);


        }


//Editar
public function getUsuarioEditar(User $id/*,Request $request*/){
   $usu= User::find($id->id);
   $pass= Pasaporte::orderBy('id','asc')->get();
   $rol=Role::all();
 return view('Usuarios.edit',['usuario'=>$usu,'pasa'=>$pass,'roll'=>$rol/*,'idGuardar'=>$guardar*/]);
 }


 public function getUsuarioEdit(Request $request)
     {

       $guardarNumeroPasaporte=$request->input('pasaporteE');
       $i = $request->get('identificacionE');
       $p = $request->get('pasaporteE');
       $gFechaVecimiento=Carbon::parse($request->input('fechaVencimientoE'));
       $gfechaNacimiento=Carbon::parse($request->input('fechaNacimientoE'));

       if (($i==null||$i==" ") && ($p==null||$p==" ")) {
         return redirect()->back()->with('warning', 'Debe volver a escribir la Identificación o el Pasaporte');
       } else if (($i!=null||$i=!" ") && ($p==null||$p==" ")) {
       if ($request->input('identificacionE')==null || $request->input('identificacionE')==" ") {

       $this->validate($request, [
                 'identificacionE' => 'required|max:9',
               ]);

       }else if ($gfechaNacimiento>Carbon::now()) {
       return redirect()->back()->with('warning', 'La fecha de nacimiento no puede ser mayor a la del dia de hoy')->withInput();
       }else{
       $this->validate($request, [
                 'nombreE' => 'required|string|min:3|max:30',
                 'apellido1E' => 'required|string|min:3|max:20',
                 'apellido2E' => 'required|string|min:3|max:20',
                 'fechaNacimientoE' => 'required|date',
                 'celularE' => 'required|string|min:8|',
                 'correoE' => 'required|email|string|max:255',
                 'direccionE' => 'required|string|max:500',
                 'password' => 'required|string|confirmed',
               ]);
               $us=User::find($request->input('id'));
               $us->identificacion=$request->input('identificacionE');
               $us->idPasaporte=null;
     $us->name=$request->input('nombreE');
     $us->apellido1=$request->input('apellido1E');
     $us->apellido2=$request->input('apellido2E');
     $us->fechaNacimiento=$request->input('fechaNacimientoE');
     $us->telefono=$request->input('telefonoE');
     $us->celular=$request->input('celularE');
     $us->email=$request->input('correoE');
     $us->direccion=$request->input('direccionE');
     $us->password=Hash::make( $request->input('password'));
                $miRole=Role::find($request->input('idRoleE'));
                $us->roles()->associate($miRole);
                $us->save();
                 return redirect()->route('usuario.index')->with('success', 'Usuario: ' . $request->input('nombreE').' editado correctamente');
       }
     }else if(($p!=null||$p=!" ") && ($i==null||$i==" ") ){
         if ($request->input('pasaporteE')==null || $request->input('pasaporteE')==" " ||$request->input('fechaEmisionE')==null || $request->input('fechaVencimientoE')==null) {
           $this->validate($request, [
             'pasaporteE' => 'required|string',
             'fechaEmisionE' => 'required|date',
             'fechaVencimientoE' => 'required|date',
                     ]);
         }else if ($gfechaNacimiento>Carbon::now()) {
           return redirect()->back()->with('warning', 'La fecha de nacimiento no puede ser mayor a la del dia de hoy')->withInput();
         }else {
           $this->validate($request, [
                      'pasaporteE' => 'required|string',
                       'nombreE' => 'required|string|min:3|max:30',
                       'apellido1E' => 'required|string|min:3|max:20',
                       'apellido2E' => 'required|string|min:3|max:20',
                       'fechaNacimientoE' => 'required|date',
                       'celularE' => 'required|string|min:8|',
                       'correoE' => 'required|email|string|max:255',
                       'direccionE' => 'required|string|max:500',
                       'password' => 'required|string|confirmed',
                     ]);

                     $us=User::find($request->input('id'));
                     $us->identificacion=null;
           $us->name=$request->input('nombreE');
           $us->apellido1=$request->input('apellido1E');
           $us->apellido2=$request->input('apellido2E');
           $us->fechaNacimiento=$request->input('fechaNacimientoE');
           $us->telefono=$request->input('telefonoE');
           $us->celular=$request->input('celularE');
           $us->email=$request->input('correoE');
           $us->direccion=$request->input('direccionE');
           $us->password=Hash::make( $request->input('password'));

           $buscarPasaporte=Pasaporte::where('numeroPasaporte',$request->input('pasaporteE'))->get()->first();
           $passport;
           if ($buscarPasaporte!=null) {
           $passport=Pasaporte::where('numeroPasaporte',$request->input('pasaporteE'))->first();
           $passport->numeroPasaporte=$request->input('pasaporteE');
           $passport->fechaEmision=$request->input('fechaEmisionE');
           $passport->fechaVencimiento=$request->input('fechaVencimientoE');
           $passport->save();
           }else{
           $passport=new Pasaporte([
             'numeroPasaporte'=>$request->input('pasaporteE'),
             'fechaEmision'=>$request->input('fechaEmisionE'),
             'fechaVencimiento'=>$request->input('fechaVencimientoE'),
           ]);
           $passport->save();
           }

                   $us->pasaportes()->associate($passport);
                   $miRole=Role::find($request->input('idRoleE'));
                   $us->roles()->associate($miRole);
                   $us->save();
                   return redirect()->route('usuario.index')->with('success', 'Usuario: ' . $request->input('nombreE').' editado correctamente');
       }
     }else if (($i!=null||$i=!" ") && ($p!=null||$p=!" ")) {

       $this->validate($request, [
                   'identificacionE' => 'required|max:9',
                   'pasaporteE' => 'required|string',
                   'fechaEmisionE' => 'required|date',
                   'fechaVencimientoE' => 'required|date',
                   'nombreE' => 'required|string|min:3|max:30',
                   'apellido1E' => 'required|string|min:3|max:20',
                   'apellido2E' => 'required|string|min:3|max:20',
                   'fechaNacimientoE' => 'required|date',
                   'celularE' => 'required|string|min:8|',
                   'correoE' => 'required|email|string|max:255',
                   'direccionE' => 'required|string|max:500',
                   'password' => 'required|string|confirmed',
                 ]);

                 if ($gfechaNacimiento>Carbon::now()) {
                   return redirect()->back()->with('warning', 'La fecha de nacimiento no puede ser mayor a la del dia de hoy')->withInput();
                 }else {

                   $us=User::find($request->input('id'));
                   $us->identificacion=$request->input('identificacionE');
         $us->name=$request->input('nombreE');
         $us->apellido1=$request->input('apellido1E');
         $us->apellido2=$request->input('apellido2E');
         $us->fechaNacimiento=$request->input('fechaNacimientoE');
         $us->telefono=$request->input('telefonoE');
         $us->celular=$request->input('celularE');
         $us->email=$request->input('correoE');
         $us->direccion=$request->input('direccionE');
         $us->password=Hash::make( $request->input('password'));

         $buscarPasaporte=Pasaporte::where('numeroPasaporte',$request->input('pasaporteE'))->get()->first();
         $passport;
         if ($buscarPasaporte!=null) {
         $passport=Pasaporte::where('numeroPasaporte',$request->input('pasaporteE'))->first();
         $passport->numeroPasaporte=$request->input('pasaporteE');
         $passport->fechaEmision=$request->input('fechaEmisionE');
         $passport->fechaVencimiento=$request->input('fechaVencimientoE');
         $passport->save();
       }else{
         $passport=new Pasaporte([
           'numeroPasaporte'=>$request->input('pasaporteE'),
           'fechaEmision'=>$request->input('fechaEmisionE'),
           'fechaVencimiento'=>$request->input('fechaVencimientoE'),
         ]);
     $passport->save();
       }


                           $miPassport=Pasaporte::Where('numeroPasaporte',$request->input('pasaporteE'))->get()->first();
                           $us->pasaportes()->associate($miPassport);
                           $miRole=Role::find($request->input('idRoleE'));
                           $us->roles()->associate($miRole);
                           $us->save();
                          return redirect()->route('usuario.index')->with('success', 'Usuario: ' . $request->input('nombreE').' editado correctamente');
               }
       }
     }






public function getFiltroRoles($id){
         $user = User::orderBy('name','desc')->paginate(5);
$roll=Role::whereBetween('id',[2,3])->get();
         return view('Usuarios.index',['usuario'=>$user,'ro'=>$roll,'idRolBusc'=>$id]);
}

   //Eliminar
      public function destroyUsuario($id)
              {
                  $usuario = User::find($id);
                  $usuario->delete();
                return redirect()->route( "usuarioIndex.index" )->with('info','Usario','Eliminado');
              }

              public function restore( $id )
                {
                    //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
                      $usuario = User::withTrashed()->where('id', '=', $id)->first();

                    //Restauramos el registro
                      $usuario->restore();

                    return redirect()->route( "usuarioIndex.index" )->with("restore" , $id );
                }
                public function getUsuarioDestino(){
                  $User=User::orderBy('identificacion','asc')->get();
                  $Dest=Destino::orderBy('lugar','asc')->get();
                  return view('Usuarios.Usuario-Cliente',['usuario'=>$User,'destino'=>$Dest]);
                }
                public function postUsuarioDestino(Request $request){
                  $User=User::where('id','=',$request->input('usuarioId'))->first();
                  $Dest=Destino::where('id','=',$request->input('destinoId'))->first();
                  $cantidad=1;
                  $traerUsuarioDB=null;
                  $traerUsuarioDB=DB::table('cliente_destinos')->where('idUser','=',$User->id)->where('idDestino','=',$Dest->id)->first();

                      if($traerUsuarioDB!=null|| $traerUsuarioDB=!" "){

                        $usuarioCantidad= DB::table('cliente_destinos')->select('cantidad')->where('idUser','=',$User->id)->where('idDestino','=',$Dest->id)->first()->cantidad;
                       $sumatoria=$usuarioCantidad+1;
                        $usuarioAcualizar=  DB::table('cliente_destinos')->where('idUser','=',$User->id)->where('idDestino','=',$Dest->id)->update(['cantidad'=>$sumatoria]);

                          return redirect()->route('usuario.cliente-destino')->with('success', 'Cantidad de viaje agregado correctamente');
                      }else{
                        $User->destinos()->attach($Dest->id,['cantidad'=>$cantidad]);
                        return redirect()->route('usuario.cliente-destino')->with('success', 'Registro agregado correctamente');

                      }
              //  $User->destinos()->sync($User->id,$Dest->id,$cantidad);
            //    DB::table('cliente_destinos')->insert(['idUser'=>$User->id,'idDestino'=>$Dest->id,'cantidad'=>$cantidad]);
                              }
                              public function getListadoClientesDestino(){
                                $User=User::orderBy('identificacion','asc')->get();
                                $Dest=Destino::orderBy('lugar','asc')->get();
                                return view('Reportes.ListadoClientes-Destinos',['usuario'=>$User,'destino'=>$Dest]);
                              }

}
