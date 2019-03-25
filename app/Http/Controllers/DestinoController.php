<?php
namespace App\Http\Controllers;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Destino;
use App\Pais;
use App\Pasaporte;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
Use DB;

class DestinoController extends Controller
{
  public function getIndexDestino(){

         $destino = Destino::orderBy('lugar','asc')->paginate(5);
$pais=Pais::all();
     return view('Destinos.Index',['dest'=>$destino,'pais'=>$pais]);
 }

 public function getIndexDestinoPrueba(){

        $destino = Destino::orderBy('lugar','asc')->paginate(5);
 $pais=Pais::all();
    return view('Destinos.IndexDest',['dest'=>$destino,'pais'=>$pais]);
 }

 public function getDestinosCreate(){
          $pais=Pais::all();
            return view('Destinos.create',['pais'=>$pais]);
          }


          public function postDestinosCreate(Request $request)
          {

                $this->validate($request, [
                  'lugar' => 'required|string|min:4|max:30',
                  'FechaIda' => 'required|date',
                  'FechaLlegada' => 'required|date',
                  'pais'=>'required',
                ]);

                //Fechas de salida y de llegada para Firefox
                $FechaSalidaF=Carbon::parse($request->input('FechaIda'));
                $PFechaSalidaF=$FechaSalidaF->format('m/d/Y');
                $FechallegadaF=Carbon::parse($request->input('FechaLlegada'));
                $PFechaLlegadaF=$FechallegadaF->format('m/d/Y');
                //Fin de Fechas de salida y de llegada para Firefox

                //Fechas de salida y de llegada para chrome
                $FechaSalidaC=Carbon::parse($request->input('FechaIda'));
                $PFechaSalidaC=$FechaSalidaC->format('d/m/Y');
                $FechallegadaC=Carbon::parse($request->input('FechaLlegada'));
                $PFechaLlegadaC=$FechallegadaC->format('d/m/Y');
                //Fin de Fechas de salida y de llegada para chrome

                /*$fecha1 = strtotime(date("d-m-Y"),$request->input('fechaLlegada'));
                $fecha2 = strtotime(date("d-m-Y"),$request->input('fechaIda'));*/

                if ($FechallegadaF<$FechaSalidaF||$FechallegadaC<$FechaSalidaC) {
                    return redirect()->back()->with('warning', 'La fecha de llegada no debe ser menor a la fecha de salida')->withInput();

                }else {
                  $dest = new Destino([
                           'lugar'=>$request->input('lugar'),
                           'tourDescripcion'=> $request->input('tourDescripcion'),
                           'fechaIda'=> $request->input('FechaIda'),
                           'fechaLlegada'=> $request->input('FechaLlegada'),
                      ]);

                      $miPais=Pais::find($request->input('pais'));
                      $dest->paises()->associate($miPais);
                      $dest->save();

                  }

                  return redirect()->route('indexDestinos')->with('success', 'Destino: ' . $request->input('lugar').' guardado correctamente');

}




        public function getListadoDestino(){
                       $destino = Destino::orderBy('lugar','asc')->paginate(5);
              $pais=Pais::all();
                   return view('Reportes.ListadoDestinos',['dest'=>$destino,'pais'=>$pais]);
               }
               public function getListadoDestinoFechas(){
                              $destino = Destino::orderBy('lugar','asc')->paginate(5);
                     $pais=Pais::all();
                          return view('Reportes.ListadoDestinosFechas',['dest'=>$destino,'pais'=>$pais]);
                      }

             public function getDestinoEditar(Destino $id){

                $dest=Destino::find($id->id);
                $pais= Pais::all();
              return view('Destinos.Edit',['destino'=>$dest,'pais'=>$pais]);
              }


              public function postDestinoEdit(Request $request)
                  {
                    $this->validate($request, [
                      'lugar' => 'required|string|min:3|max:30',
                      'FechaIda' => 'required|date',
                      'FechaLlegada' => 'required|date',
                      'pais'=>'required',
                    ]);
                    $dest=Destino::find($request->input('id'));
                    $dest->lugar=$request->input('lugar');
                    $dest->tourDescripcion=$request->input('tourDescripcion');
                    $dest->fechaIda=$request->input('FechaIda');
                    $dest->fechaLlegada=$request->input('FechaLlegada');

                        $miPais=Pais::find($request->input('pais'));
                        $dest->paises()->associate($miPais);
                        $dest->save();

                      return redirect()
                      ->route('indexDestinos')->with('success', 'Destino: ' . $request->input('lugar').' editado correctamente');
                  }




  public function byPaises(){
$Paises=DB::table('pais')->get();
return response()->json($Paises);
}



  public function byDestinos(){
$Destino=DB::table('Destinos')->get();
return response()->json($Destino);
}


}
