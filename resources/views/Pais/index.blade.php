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
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Mantenimiento Paises</h2>

                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                   <table id="datatable" class="table table-striped table-bordered">
                     <thead>
                       <tr>
                         <th>Nombre</th>
                         <th>Fecha de creación</th>
                         <th class="text-center" width="150px">
                           <a href="{{route('paises.crear')}}" class="create-modal btn btn-success" >
                             <i class="fa fa-plus"></i>
                           </a>
                         </th>
                       </tr>
                     </thead>


                     <tbody>


                       @csrf
                       @foreach ($pai as $item)
                         <tr class="usuario{{$item->id}}">
                           <td>{{ $item->nombrePais }}</td>
                           <td>{{Date("d-M-Y",strtotime($item->created_at))}}</td>
                           <td>
                             <a href="#" class="show-modalPais btn btn-info" data-id="{{$item->id}}"  data-name="{{$item->nombrePais}}" data-fechap="{{Date("d-M-Y",strtotime($item->created_at))}}">
                               <i class="fa fa-eye"></i>
                             </a>
                             <a href="{{route('paises.editar',['id'=>$item->id])}}" class="edit-modal btn btn-warning" data-id="{{$item->id}}" data-name="{{$item->nombrePais}}"  >
                               <i class="fa fa-edit"></i>
                             </a>
                             <!---->
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


         <div id="miVentanaPais" class="modalPrueba"   >
           <div class="modal-dialog" role="document">
             <div id="modalContenidoP" class="modal-content">
               <div class="modal-header">
                     <h5 class="modal-title"><b>Detalle Pais</h5>
                     <button type="button" onclick="ocultarVentanaPais();" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
             <div class="modal-body">
               <div class="form-group">
                 <label for="">Nombre:</label>
                 <b id="nompais"/>
               </div>
               <div class="form-group">
                 <label for="">Fecha creación:</label>
                 <b id="fechacrea"/>
               </div>
           </div>

         </div>
         </div>

         </div>
         @endsection
