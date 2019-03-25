<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use App\Role;
use App\Pais;
use App\User;
use DB;
use App\Pasaporte;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class PaisController extends Controller
{
  public function getIndexPaises(){

         $pais = Pais::orderBy('nombrePais','asc')->paginate(5);
       //  $idRolBusc=-1;
     return view('Pais.index',['pai'=>$pais]);
 }

 public function getPaisCreate(){
           $pais=Role::all();
           return view('Pais.create',['pai'=>$pais]);
         }

   public function postPaisCreate(Request $request)
 {

   $this->validate($request, [
     'nombrePais' => 'required|min:4|unique:pais'
   ]);



  $pa = new Pais([
           'nombrePais'=> $request->input('nombrePais')
      ]);
      $pa->save();
      return redirect()->route('paises.index')->with('success', 'Pais: ' . $request->input('nombrePais').' guardado correctamente');


           }

 public function getPaisEditar(Pais $id/*,Request $request*/){
    // $p=Pais::find();*/
    //$guardar=$request->input('idG');
    $pais= Pais::find($id->id);
  return view('Pais.edit',['viajar'=>$pais/*,'idGuardar'=>$guardar*/]);
  }


  public function getPaisEdit(Request $request)
      {
        $this->validate($request, [
            'nombrePais' => 'required|min:4|unique:pais'
        ]);
        $p=Pais::find($request->input('id'));

        $p->nombrePais=$request->input('nombrePais');
        $p->save();
        return redirect()->route('paises.index')->with('success', 'Pais: ' . $request->input('nombrePais').' editado correctamente');
  }



}
