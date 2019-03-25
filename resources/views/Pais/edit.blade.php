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
                     <h2>Editar un País</h2>

                     <div class="clearfix"></div>
                   </div>
                   <div class="x_content">
                     <br />
                     <form name="formEdit" action="{{route('paises.edit',['id'=>$viajar->id])}}" method="post" data-parsley-validate class="form-horizontal form-label-left">

                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nombre del País: *</span>
                         </label>
                         <div class="col-md-3 col-sm-3 col-xs-12">
                      <input type="text" required placeholder="País" value="{{$viajar->nombrePais}}" id="nombrePais" name="nombrePais" >
                         </div>
                       </div>

              <input type="hidden" name="id" value="{{$viajar->id}}"/>


                       <div class="ln_solid"></div>
                       <div class="form-group">
                         <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           @csrf
                           <button type="submit" class="btn btn-success">Actualizar</button>
                             <a href="{{route('paises.index')}}" class="btn btn-primary">Atrás</a>

                         </div>
                       </div>

                     </form>
                   </div>
                 </div>
               </div>
             </div>






           </div>

         @endsection
