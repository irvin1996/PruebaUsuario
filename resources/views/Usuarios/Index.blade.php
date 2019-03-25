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
                   <h2>Mantenimiento Usuarios</h2>

                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                   <table id="datatable" class="table table-striped table-bordered">
                     <thead>
                       <tr>
                         <th>Pasaporte</th>
                         <th>Identificación</th>
                         <th>Nombre</th>
                         <th>Celular</th>
                         <th>Email</th>
                         <th class="text-center" width="150px">
                           <a href="{{route('usuario.crear')}}" class="create-modal btn btn-success" >
                             <i class="fa fa-plus"></i>
                           </a>
                         </th>
                       </tr>
                     </thead>


                     <tbody>


                       @csrf
                       @foreach ($us as $item)
                         <tr class="usuario{{$item->id}}">
                           <td>@foreach ($pass as $key)
                              @if ($item->idPasaporte==$key->id)
                                {{$key->numeroPasaporte}}
                          @endif
                        @endforeach
                        </td>
                           <td>{{ $item->identificacion }}</td>
                          <td>{{ $item->name.' '.$item->apellido1}}</td>
                           <td>{{ $item->celular }}</td>
                           <td>{{ $item->email }}</td>
                           <td>
                             <a href="#" class="show-modalUsu btn btn-info" data-id="{{$item->identificacion}}"  data-name="{{$item->name}}" data-fechanacimiento="{{date('d-m-Y',strtotime($item->fechaNacimiento))}}" data-celular="{{$item->celular}}" data-telefono="{{$item->telefono}}" data-email="{{$item->email}}"  data-direccion="{{$item->direccion}}">
                               <i class="fa fa-eye"></i>
                             </a>
                             <a href="{{route('usuario.editar',['id'=>$item->id])}}" class="edit-modal btn btn-warning" data-id="{{$item->identificacion}}" data-name="{{$item->name}}" data-fechanacimiento="{{$item->fechaNacimiento}}" data-celular="{{$item->celular}}" data-email="{{$item->email}}"  >
                               <i class="fa fa-edit"></i>
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


            <div id="miVentanaUsu" class="modalPrueba"   >
              <div class="modal-dialog" role="document">
                <div id="modalContenidoU" class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title"><b>Detalle Usuario</h5>
                        <button type="button" onclick="ocultarVentanaUsu();" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="">Identificación:</label>
                    <b id="i"/>
                  </div>
                  <div class="form-group">
                    <label for="">Nombre:</label>
                    <b id="nom"/>
                  </div>
                  <div class="form-group">
                    <label for="">Fecha Nacimiento:</label>
                    <b id="feNa"/>
                  </div>
                  <div class="form-group">
                    <label for="">Teléfono:</label>
                    <b id="tel"/>
                  </div>
                  <div class="form-group">
                    <label for="">Celular:</label>
                    <b id="celu"/>
                  </div>

                  <div class="form-group">
                    <label for="">Correo:</label>
                    <b id="emai"/>
                  </div>
                  <div class="form-group">
                    <label for="">Dirección:</label>
                    <b id="direc"/>
                  </div>
              </div>

            </div>
            </div>

            </div>

         @endsection
