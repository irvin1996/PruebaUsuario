@extends('layouts.admin')
@section('titulo','País')
@section('contenido')
  <div class="">
             <div class="page-title">
               <div class="title_left">
                 <h3>Viajes Positivos</h3>
                 <br>
                 <div class="col-md-8 col-sm-8 ">
                @include('partials.errors')
               </div>

               </div>

             </div>


             <div class="clearfix"></div>
             <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>Editar Destinos</h2>

                     <div class="clearfix"></div>
                   </div>
                   <div class="x_content">
                     <br />
                     <form action="{{route('destino.edit',['id'=>$destino->id])}}" method="post" data-parsley-validate class="form-horizontal form-label-left">


                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Pais: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                           <select id="pais" name="pais" class="input-sm">
                             @foreach ($pais as $pa)
                           <option value="{{$pa->id}}" {{$destino->idPais==$pa->id?"selected":""}} >{{$pa->nombrePais}}</option>
                             @endforeach
                             </select>


                              </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Lugar: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="text" required value="{{$destino->lugar}}" placeholder="Lugar" id="lugar" name="lugar" >
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Descripcion del Tour: </span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                           <textarea type="text" placeholder="Descripcion del Tour(Opcional)" id="tourDescripcion" name="tourDescripcion" >{{$destino->tourDescripcion}}</textarea>
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Fecha Salida: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="date" value="{{$destino->fechaIda}}" required placeholder="Fecha Salida" id="FechaIda" name="FechaIda" >
                       </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Fecha Llegada: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="date" required value="{{$destino->fechaLlegada}}" placeholder="Fecha Llegada" id="FechaLlegada" name="FechaLlegada">
                       </div>
                       </div>


                       <input type="hidden" name="id" value="{{$destino->id}}"/>


                       <div class="ln_solid"></div>
                       <div class="form-group">
                         <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           @csrf
                           <button type="submit" class="btn btn-success">Actualizar</button>
                             <a href="{{route('indexDestinos')}}" class="btn btn-primary">Atrás</a>

                         </div>
                       </div>

                     </form>
                   </div>
                 </div>
               </div>
             </div>






           </div>

         @endsection
