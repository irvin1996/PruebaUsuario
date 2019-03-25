@extends('layouts.admin')
@section('titulo','País')
@section('contenido')
<div class="">
  <br>
    <section class="content-header">
      <h1>
        Viajes Positivos
      </h1>

    </section>
    <br>
    <br>

  @if(Session::has('info'))
          <div class="row">
              <div class="col-md-4">
                  <p class="alert alert-info">{{Session::get('info')}}</p>
              </div>
          </div>
  @endif
  <br>
    @include('sweetalert::alert')
           <div class="row">

             <br>
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Listado Destinos </h2>

                   <br><br>
                   <label>
                     Busqueda de Destinos por rango de fechas por fecha de Salida
                   </label>
                   <br>
                                 <label> Fecha:
                                       <input type="date"  required placeholder="Fecha Salida" id="FechaIda" name="FechaIda" >
                                 </label>
                                 &nbsp;  <label> a
                                       <input type="date"  required placeholder="Fecha Llegada" id="FechaLlegada" name="FechaLlegada" >
                     </label>

                        &nbsp;&nbsp;<button type="submit" class="btn btn-success">Buscar</button>

                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                   <div class="col-sm-6">


                <br>
                <br>

                   </div>

                   <table id="datatable" class="table table-striped table-bordered">
                     <thead>
                       <tr>

                         <th>Nombre del Destino</th>
                           <th>Fecha Salida</th>
                       <th> </th>
                       </tr>
                     </thead>


                     <tbody  class="contenidobusqueda">


                       @csrf
                       @foreach ($dest as $itemDes)
                         <tr class="dest{{$itemDes->id}}">
                        @foreach ($pais as $p)
                          @if ($p->id==$itemDes->idPais)
                          <?php $nombre=$p->nombrePais ?>
                            @endif
                          @endforeach
                         <td >{{$itemDes->lugar}}</td>
                             <td >{{$itemDes->fechaIda}}</td>
                           <td>
                             <a href="#" class="show-modal btn btn-info" data-paisdes="{{$nombre}}" data-lugar="{{$itemDes->lugar}}" data-descdestino="{{$itemDes->tourDescripcion}}" data-fechaida="{{$itemDes->fechaIda}}" data-fechallegada="{{$itemDes->fechaLlegada}}" >
                              <i class="fa fa-eye"></i>
                             </a>

                           </td>

                         </tr>
                       @endforeach


                     </tbody>
                   </table>
                 </div>
               </div>
             </div>





           </div>
         </div>


         <div id="miVentana" class="modalPrueba"   >
           <div class="modal-dialog" role="document">
             <div id="modalContenido" class="modal-content">
               <div class="modal-header">
                     <h5 class="modal-title"><b>Detalle Destino</h5>
                     <button type="button" onclick="ocultarVentana();" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
             <div class="modal-body">
               <div class="form-group">
                 <label for="">Pais:</label>
                 <b id="pais"/>
               </div>
               <div class="form-group">
                 <label for="">Destino:</label>
                 <b id="nom"/>
               </div>
               <div class="form-group">
                 <label for="">Descripcion Tour:</label>
                 <b id="TourDescrip"/>
               </div>
               <div class="form-group">
                 <label for="">Fecha Salida:</label>
                 <b id="fechaSalida"/>
               </div>
               <div class="form-group">
                 <label for="">Fecha Llegada:</label>
                 <b id="fechallegada"/>
               </div>
           </div>

         </div>
         </div>

         </div>

         @endsection
